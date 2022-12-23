<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function getIndex()
    {
        $products = Product::all();
        return view('shop.index', ['products' => $products]);
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('product.index')->with('success', 'Successfully purchased products!');
    }

    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }

    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart); 
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('product.shoppingCart');
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $totalQty = $cart->totalQty;
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total, 'totalQty' => $totalQty]);
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $request->session()->put('customer', [$request->input('name'), $request->input('phone_number')]);

        $order = new Order();
        $order->cart = serialize($cart);
        $order->name = $request->input('name');
        $order->phone_number = $request->input('phone_number');

        if (Auth::check()) {
            Auth::user()->orders()->save($order);
        } else {
            $order->user_id = null;
            $order->save();
        }

        return redirect()->route('checkout.success')->with('success', 'Checkout successfully, pay at the cashier.');
    }
    
    public function checkoutSuccess()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $products = new Cart($oldCart);

        $customer = Session::get('customer');
        
        Session::forget('cart');
        Session::forget('customer');

        return view('shop.checkout-success', ['products' => $products, 'customer' => $customer])->with('success', 'Please pay at the cashier 😊');
    }
}

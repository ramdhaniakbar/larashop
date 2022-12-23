<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class, 'getIndex'])->name('product.index');

Route::get('/add-to-cart/{id}', [ProductController::class, 'getAddToCart'])->name('product.addToCart');
Route::get('/shopping-cart', [ProductController::class, 'getCart'])->name('product.shoppingCart');
Route::get('/reduce/{id}', [ProductController::class, 'getReduceByOne'])->name('product.reduceByOne');
Route::get('/remove/{id}', [ProductController::class, 'getRemoveItem'])->name('product.remove');

Route::get('/checkout', [ProductController::class, 'getCheckout'])->name('checkout');
Route::post('/checkout', [ProductController::class, 'postCheckout'])->name('checkout');
Route::get('/checkout-success', [ProductController::class, 'checkoutSuccess'])->name('checkout.success');

Route::group(['prefix' => 'user'], function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/signup', [UserController::class, 'getSignup'])->name('user.signup');
        Route::post('/signup', [UserController::class, 'postSignup'])->name('user.signup');
        Route::get('/signin', [UserController::class, 'getSignin'])->name('user.signin');        
        Route::post('/signin', [UserController::class, 'postSignin'])->name('user.signin');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/profile', [UserController::class, 'getProfile'])->name('user.profile');
        Route::get('/logout', [UserController::class, 'getLogout'])->name('user.logout');
    });
});

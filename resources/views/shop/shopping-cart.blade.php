@extends('layouts.master')

@section('title', 'LaraShop Shopping Cart')

@section('content')
@if (Session::has('cart'))
<div class="row mb-3">
   <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
      <ul class="list-group">
         @foreach ($products as $product)
         <li class="list-group-item">
            <span class="badge text-bg-secondary float-end">{{ $product['qty'] }}</span>
            <strong>{{ $product['item']['title'] }}</strong>
            <span class="badge text-bg-success">${{ $product['price'] }}</span>
            <div class="btn-group">
               <button type="button" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle">Action <span
                     class="caret"></span></button>

               <ul class="dropdown-menu">
                  <li><a class="dropdown-item"
                        href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}">Reduce by 1</a></li>
                  <li><a class="dropdown-item"
                        href="{{ route('product.remove', ['id' => $product['item']['id']]) }}">Reduce All</a></li>
               </ul>
            </div>
         </li>
         @endforeach
      </ul>
   </div>
</div>
<div class="row mb-3">
   <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
      <strong>Total: ${{ $totalPrice }}</strong>
   </div>
</div>
<hr>
<div class="row">
   <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
      <a href="{{ route('checkout') }}" type="button" class="btn btn-success">Checkout</a>
   </div>
</div>
@else
<div class="row">
   <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
      <h2>No Items in Cart!</h2>
   </div>
</div>
@endif
@endsection
@extends('layouts.master')

@section('title', 'LaraShop Checkout')

@section('content')
<div class="row d-flex justify-content-center mb-3">
   <div class="col-sm-6 col-md-4 col-md-offset-3 col-sm-offset-3">
      <h2>Checkout</h2>
      <span>Total Items: {{ $totalQty }}</span>
      <span class="float-end">Your Total: ${{ $total }}</span>
      <form action="{{ route('checkout') }}" method="post">
         @csrf
         <div class="row mt-3">
            <div class="col-xs-12 mb-3">
               <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" id="name" class="form-control" name="name" required />
               </div>
            </div>
            <div class="col-xs-12 mb-3">
               <div class="form-group">
                  <label for="phone_number">Phone Number</label>
                  <input type="text" id="phone_number" class="form-control" name="phone_number" required />
               </div>
            </div>
         </div>
         <button type="submit" class="btn btn-success">Buy now</button>
      </form>
   </div>
</div>
@endsection
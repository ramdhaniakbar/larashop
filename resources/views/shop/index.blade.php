@extends('layouts.master')

@section('title', 'LaraShop')

@section('content')

@if (Session::has('success'))
<div class="row d-flex justify-content-center">
   <div class="col-sm-6 col-lg-4">
      <div class="alert alert-success" role="alert">
         {{ Session::get('success') }}
      </div>
   </div>
</div>
@endif

@foreach ($products->chunk(4) as $productChunk)
<div class="row">
   @foreach ($productChunk as $product)
   <div class="col-sm-6 col-md-4 col-lg-3 ">
      <div class="card mb-4">
         <img src="{{ $product->imagePath }}" class="img-fluid" alt="mie_goreng">
         <div class="card-body text-right">
            <h4 class="card-title">{{ $product->title }}</h4>
            <p class="card-text description">{{ $product->description }}</p>
            <span class="price">${{ $product->price }}</span>
            <a href="{{ route('product.addToCart', ['id' => $product->id]) }}"
               class="btn btn-success text-center float-end">Add to Cart</a>
         </div>
      </div>
   </div>
   @endforeach
</div>
@endforeach
@endsection
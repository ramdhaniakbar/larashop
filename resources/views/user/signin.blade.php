@extends('layouts.master')

@section('title', 'Signin Page')

@section('content')
<div class="row d-flex justify-content-center">
   <div class="col-md-4 col-md-offset-4">
      <h1>Sign In</h1>
      @if (count($errors) > 0)
      <div class="alert alert-danger" role="alert">
         @foreach ($errors->all() as $error)
         <p>{{ $error }}</p>
         @endforeach
      </div>
      @endif
      <form action="{{ route('user.signin') }}" method="post" class="mt-3">
         @csrf
         <div class="form-group mb-2">
            <label for="email">Email</label>
            <input class="form-control" type="text" id="email" name="email">
         </div>
         <div class="form-group mb-3">
            <label for="password">Password</label>
            <input class="form-control" type="password" id="password" name="password">
         </div>
         <button type="submit" class="btn btn-primary">Sign In</button>
      </form>
   </div>
</div>
@endsection
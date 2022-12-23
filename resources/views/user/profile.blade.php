@extends('layouts.master')

@section('title', 'Signin Page')

@section('content')
<div class="row">
   <div class="col-md-4 col-md-offset-4">
      <h2>User Profile</h2>
      <span>{{ auth()->user()->email }}</span>
   </div>
</div>
@endsection
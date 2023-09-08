@extends('layouts.app')
@section('title'){{'Profile'}} @endsection
@section('content')
<div class="container">
  <div class="row jusitfy-content-center" >
      <div class="col-sm-8">
        <div class="text-right"><a href="./list" class="btn btn-dark mt-2">Back</a></div>
      <div class="card mt-3 p-3" style="width: 860px;">
        <h3 class="ml-4"> <strong>User Profile</strong></h3>
      <ul>
        <br>
      <p><strong>Name:</strong> {{$userdata->name}}</p>
      <p><strong>Email:</strong> {{$userdata->email}}</p>
     </ul>
    </div>
    </div>
  </div>
@endsection
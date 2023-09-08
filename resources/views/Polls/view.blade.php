@extends('layouts.app')
@section('title'){{'View Poll'}} @endsection
@section('content')
<div class="container">
  <div class="row jusitfy-content-center" >
      <div class="col-sm-8">
        <div class="text-right"><a href="./list" class="btn btn-dark mt-2">Back</a></div> 
  <div class="card mt-3 p-3" style="width: 860px;">
      @foreach($polls as $poll)
      <div><h4> <strong>Question:</strong> {{$poll->questions->question}} </h4>
      </div>
      <ul>
        <p><li><strong>{{ $poll->option1 }}</strong> ({{ $hello1 }})</li></p>
        <p><li><strong>{{ $poll->option1 }}</strong> ({{ $hello2 }})</li></p>
        <p><li><strong>{{ $poll->option1 }}</strong> ({{ $hello3 }})</li></p>
        <p><li><strong>{{ $poll->option1 }}</strong> ({{ $hello4 }})</li></p>
    </ul>
      @endforeach
    </div>
  </div>
  </div>
  </div>

@endsection
@extends('layouts.app')
@section('title'){{'Vote a Poll'}} @endsection
@section('content')

<div class="container">
  <div class="row jusitfy-content-center" >
      <div class="col-sm-8">
        <h2 class="text-center">Vote a Poll</h2>
  <div class="card mt-4  p-4" style="width: 860px;">
      <form  method="POST"  action="{{ route('voteuser') }}">
        @csrf 
      <div><h6> <strong>Question:</strong> {{ $votes[0]->questions->question}} </h6></div>
      <div>
        <input type="hidden" id="question_id" name="question_id" value="{{ $votes[0]->questions->id}} ">
        <input type="hidden" id="option_id" name="option_id" value="{{ $votes[0]->id}}">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="select_option" id="exampleRadios1"  value="{{ $votes[0]->option1 }}">
            <label class="form-check-label" for="exampleRadios1">
             {{$votes[0]->option1}}
            </label>
        </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="select_option" id="exampleRadios2"  value="{{ $votes[0]->option2 }}">
        <label class="form-check-label" for="exampleRadios2">
             {{$votes[0]->option2}}
        </label>
        </div>
        <div div class="form-check">
            <input class="form-check-input" type="radio" name="select_option" id="exampleRadios3"  value="{{ $votes[0]->option3 }}">
            <label class="form-check-label" for="exampleRadios3">
            {{$votes[0]->option3}}
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="select_option" id="exampleRadios4"  value="{{ $votes[0]->option4 }}">
        <label class="form-check-label" for="exampleRadios4">
            {{$votes[0]->option4}}
        </label>
        </div>
        @if($errors->has('select_option'))
        <span class='text-danger'>{{$errors->first('select_option')}}</span>
        @endif
      
      <br>
    <div class="form-group">
        <strong><label for="exampleInputEmail1">Email address:</label></strong>
        <input type="email" class="form-control" style="width: 500px;" id="exampleInputEmail1"  placeholder="Enter a email" name="email" value="{{ old('email') }}">
        @if($errors->has('email'))
                <span class='text-danger'>{{$errors->first('email')}}</span>
       @endif
      </div>
      
      <button type="submit" class="btn btn-dark">Vote</button>
      <a class="btn btn-info" href="{{ route('resultshow',$votes[0]->id)}}">Results</a>
    </form>
    </div>
  </div>
  </div>
  </div>
@endsection
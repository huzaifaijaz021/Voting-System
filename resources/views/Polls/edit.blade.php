@extends('layouts.app')
@section('title'){{'Edit a Poll'}} @endsection
@section('content')


<div class="container">
    <div class="row jusitfy-content-center" >
        <div class="col-sm-8">
            <div class="text-right"><a href="./list" class="btn btn-dark mt-2">Back</a></div>
        <div class="card mt-3 p-3">
            <h2 class="text-center">Create Polls</h2>
            <form method="POST" action="{{ route('update',$option->id) }}" enctype="multipart/form-data">
               @csrf 
               <div class="form-group">
                <label>Question</label>
                <input type="text" name="question" id=""  class="form-control" value="{{$option->questions->question}}"  placeholder="Enter a question:"/>
                @if($errors->has('question'))
                <span class='text-danger'>{{$errors->first('question')}}</span>
                @endif
               </div>
               <div class="form-group">
                <label>Option 1</label>
                <input type="text" name="option1" id=""  class="form-control" value="{{$option->option1}}" placeholder="Enter option1"/>
                @if($errors->has('option1'))
                <span class='text-danger'>{{$errors->first('option1')}}</span>
                @endif
               </div>
               <div class="form-group">
                <label>Option 2</label>
                <input type="text" name="option2" id=""  class="form-control" value="{{$option->option2}}" placeholder="Enter option2"/>
                @if($errors->has('option2'))
                <span class='text-danger'>{{$errors->first('option2')}}</span>
                @endif
               </div>
               <div class="form-group">
                <label>Option 3</label>
                <input type="text" name="option3" id=""  class="form-control" value="{{$option->option3}}" placeholder="Enter option3"/>
                @if($errors->has('option3'))
                <span class='text-danger'>{{$errors->first('option3')}}</span>
                @endif
               </div>
               <div class="form-group">
                <label>Option 4</label>
                <input type="text" name="option4" id=""  class="form-control" value="{{$option->option4}}" placeholder="Enter option4"/>
                @if($errors->has('option4'))
                <span class='text-danger'>{{$errors->first('option4')}}</span>
                @endif
               </div>
               
               <button type="submit" class="btn btn-dark">Update</button>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection
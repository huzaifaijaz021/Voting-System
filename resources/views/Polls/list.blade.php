@extends('layouts.app')
@section('title'){{'List of Poll'}} @endsection

@section('content')
@section('content')
<div class="container">
  <div class="text-right"><a href="./create" class="btn btn-dark mt-2">Create New Poll</a></div>
    <div class="mt-2 custom-alert">
      @if(session('error'))
      <div class="alert alert-danger" id="error-message">
          {{ session('error') }}
      </div>
      @endif
      
      @if(session('Success'))
      <div class="alert alert-success" id="success-message">
          {{ session('Success') }}
      </div>
      @endif
      </div>
      <span id="copyMessage" style="display: none;">
        <div class="alert alert-success">
          Link copied to clipboard!
          </div>
        </span>
    <table class="table table-hover mt-3">
  <thead>
    <tr>
      <th>Question</th>
      <th>Option 1</th>
      <th>Option 2</th>
      <th>Option 3</th>
      <th>Option 4</th>
      <th>Voting Link</th>
      <th>Votes</th>
      <th>View</th>
      <th>Edit</th>
      <th>Delete</th>
      <th>Results</th>
    </tr>
  </thead>
  <tbody>
    @foreach($polls as $index => $poll)
    <tr>
        <td>{{$poll->questions->question}}</td>
        <td>{{ $poll->option1 }}</td>
        <td>{{ $poll->option2 }}</td>
        <td>{{ $poll->option3 }}</td>
        <td>{{ $poll->option4 }}</td>
        {{-- <td><a  class="btn btn-link" href="{{ route('votelist',$poll->id)}}">Link</a></td> --}}
        <td><a class="btn btn-link" href="{{ route('votelist', $poll->id)}}" id="copyLink-{{ $index }}">Link</a>
          <a onclick="copyLink({{ $index }})"><i class="fa fa-copy"></i></a></td>
        {{-- <td>{{$votecount[$loop->iteration]}}</td> --}}
        <td style="color:rgb(255, 8, 0)">{{ $votecount[$index] }}</td>
        <td> <a class="btn btn-info" href="{{ route('show',$poll->id) }}">View</a></td>
        <td> <a class="btn btn-primary" href="{{ route('edit',$poll->id) }}">Edit</a></td>
        <td> <a class="btn btn-danger" href="{{ route('delete',$poll->id) }}">Delete</a></td>
        <td> <a class="btn btn-success" href="{{ route('resultshow',$poll->id) }}">Result</a></td>
    </tr>
    @endforeach
  </tbody>
  </table>
  </div>
@endsection


{{-- Display Messege for Copied Message --}}
<script>
  function copyLink(index) {
      var linkElement = document.getElementById('copyLink-' + index);
      var linkToCopy = linkElement.getAttribute('href');
      var tempInput = document.createElement('input');
      tempInput.setAttribute('value', linkToCopy);
      document.body.appendChild(tempInput);
      tempInput.select();
      document.execCommand('copy');
      document.body.removeChild(tempInput);
      var copyMessage = document.getElementById('copyMessage');
      copyMessage.style.display = 'inline';
      setTimeout(function() {
          copyMessage.style.display = 'none';
      }, 2000);}
</script>


{{-- Display Messege for Session Success/Error Message --}}
<script>
  function hideMessage(messageId) {
      setTimeout(function() {
          const messageElement = document.getElementById(messageId);
          if (messageElement) {
              messageElement.style.display = 'none';
          }
      }, 2000); 
  }
  hideMessage('error-message');
  hideMessage('success-message');
</script>
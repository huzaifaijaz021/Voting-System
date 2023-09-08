@extends('layouts.app')
@section('title'){{'Result of Polls'}} @endsection
@section('content')

<div class="container">
    <div class="row jusitfy-content-center" >
        <div class="col-sm-12">
            <div class="text-right"><a  class="btn btn-dark mt-2" href="{{ route('votelist',$h[0]->id) }}">Back to vote</a></div> 
            <div class="card mt-3 p-3">
                <div id="myPlot" style="width:100%;max-width:16000px"></div>
                </div>
            </div>
        </div>
    </div>
<script>
    const optionCounts = {!! json_encode([$hello1, $hello2, $hello3, $hello4]) !!};
    const optionNames = {!! json_encode([$option1Result, $option2Result, $option3Result, $option4Result]) !!};
    const optionLabels = optionNames.map((name, index) => `${name} (${optionCounts[index]})`);

    const questionText = {!! json_encode($h[0]->questions->question) !!};


const data = [{
  x:optionLabels,
  y:optionCounts,
  type:"bar",
  
}];

const layout = {
        title: `Votes Results <br><br> ${questionText}`,
    };

Plotly.newPlot("myPlot", data, layout);
</script>
@endsection





































{{-- @extends('layouts.app')
@section('title'){{'Result of Polls'}} @endsection
@section('content')

<div class="container">
    <div class="row jusitfy-content-center" >
        <div class="col-sm-8">
            <div class="text-right"><a  class="btn btn-dark mt-2" href="{{ route('votelist',$h[0]->id) }}">Back to vote</a></div> 
            <div class="card mt-3 p-3">
                <div id="myPlot" style="width:100%;max-width:1000px"></div>
                </div>
            </div>
        </div>
    </div>
<script>
    const optionCounts = {!! json_encode([$hello1, $hello2, $hello3, $hello4]) !!};
    const optionLabels = ["Option 1" , "Option 2 ", "Option 3 ", "Option 4 "];

const data = [{
  x:optionCounts,
  y:optionLabels,
  type:"bar",
  orientation:"h",
  marker: {color:"rgba(255,0,0,0.6)"}
}];

const layout = {title:"Votes Result"};

Plotly.newPlot("myPlot", data, layout);
</script>
@endsection --}}





{{-- @extends('layouts.app')
@section('title'){{'Result of Polls'}} @endsection
@section('content')

<div class="container">
    <div class="row jusitfy-content-center" >
        <div class="col-sm-8">
            <div class="text-right"><a href="./list" class="btn btn-dark mt-2">Back</a></div> 
            <div class="card mt-3 p-3">
                <div id="myPlot" style="width:100%;max-width:1000px"></div>
                </div>
            </div>
        </div>
    </div>
<script>
    const optionCounts = {!! json_encode([$hello1, $hello2, $hello3, $hello4]) !!};
    const optionLabels = ["Option 1" , "Option 2 ", "Option 3 ", "Option 4 "];
    const data = [{labels:optionLabels , values:optionCounts, type:"pie"}];
    const layout = {title:"Poll Voting System"};
    Plotly.newPlot("myPlot", data, layout);
    </script>
@endsection --}}












































{{-- 
@extends('layouts.app')
@section('title'){{'Result of Polls'}} @endsection
@section('content')

<div class="container">
    <div class="row jusitfy-content-center" >
        <div class="col-sm-8">
            <div class="text-right"><a href="./list" class="btn btn-dark mt-2">Back</a></div> 
            <div class="card mt-3 p-3">
                <div id="myPlot" style="width:100%;max-width:1000px"></div>
</div>
</div>
</div>
</div>
<script>
    const optionCounts = {!! json_encode([$hello1, $hello2, $hello3, $hello4]) !!};
    const optionLabels = ["Option 1" , "Option 2 ", "Option 3 ", "Option 4 "];
    
    const data = [{
      x:optionCounts,
      y:optionLabels,
      type:"bar",
      orientation:"h",
      marker: {color:"rgba(255,0,0,0.6)"}
    }];
    
    // const layout = {title:"World Wide Wine Production"};
    const layout = {
        title: 'Vote Counts for Options',
        yaxis: { title: 'Options' },
        xaxis: { title: 'Vote Counts' },
    };
    
    Plotly.newPlot("myPlot", data, layout);
    </script>
@endsection --}}
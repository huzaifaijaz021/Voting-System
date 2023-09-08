<?php
namespace App\Http\Controllers;
use App\Http\Requests\PollRequest;
use App\Http\Requests\VoteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Option;
use App\Models\Question;
use App\Models\User;
use App\Models\Voter;

class PollController extends Controller
{
    //For Profile
    public function userdata(){
        try{
        $userdata = auth()->user();
        return view('user', compact('userdata'));
        }catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    //List of Question and Options
    public function list(){
        try{
        $userId = Auth::user()->id;
        $votecount=[];
        $questions = Question::where('user_id', $userId)->get();
        // return $questions;
        foreach ($questions as $question) {
            $questionId = $question->id;
            $count = Voter::where('question_id', $questionId)->count();
            array_push($votecount, $count);  
    }
        $polls = Option::with('questions')
        ->whereHas('questions', function ($query) use ($userId) {
            $query->where('user_id', $userId);})->get();
        return view('Polls.list', compact('polls', 'votecount'));
        }catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
}



    //Create a Poll
    public function create(){
        try{
            return view('Polls.create');
        }catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }



    //Store a Poll
    public function store(PollRequest $request){
        try{
        $userId = Auth::user()->id;
        $question =Question::Create($request->queStore()+['user_id'=>$userId]);
        $option= Option::Create($request->prepareRequest()+['question_id'=>$question->id]);
        return redirect()->route('list')->with('Success', 'Poll has been created successfully.');
        }catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }




    //Edit a Poll
    public function edit($id){
        try{
        $option=Option::with('questions')->where('id', $id)->first();
        return view('Polls.edit', compact('option'));
        }catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    

    //Update a Poll
    public function update(PollRequest $request, $id){
        try{
    $option = Option::find($id);
    if ($option) {
        $option->update($request->prepareRequest()); 
        $question = Question::find($option->question_id);
        if ($question) {
            $question->update($request->queStore()); 
            return redirect()->route('list')->with('Success', 'Poll has been updated successfully');
        }
    }
    }catch (\Exception $e) {
    return redirect()->back()->with('error', $e->getMessage());
         }
    }

    //Show a Poll
    public function show($id){
        try{
        $polls = Option::with('questions')->where('id', $id)->get()->all();
        $h = Option::with('questions')->with('votes')->where('id', $id)->get();
        $option1Result = [];
        $option2Result = [];
        $option3Result = [];
        $option4Result = [];
    
        foreach ($h as $option) {
            $option1Result[] = $option->option1;
            $option2Result[] = $option->option2;
            $option3Result[] = $option->option3;
            $option4Result[] = $option->option4;
        }
        $hello1 = Voter::with('questions')->where('option_id', $id)->whereIn('selected_option', $option1Result)->count();
        $hello2 = Voter::with('questions')->where('option_id', $id)->whereIn('selected_option', $option2Result)->count();
        $hello3 = Voter::with('questions')->where('option_id', $id)->whereIn('selected_option', $option3Result)->count();
        $hello4 = Voter::with('questions')->where('option_id', $id)->whereIn('selected_option', $option4Result)->count();
        return view('Polls.view', compact('polls','hello1', 'hello2', 'hello3', 'hello4'));
        }catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }



    //Delete  a Poll
    public function destroy($id){
        try{
    $option = Option::find($id);
    if ($option) {
        $question = Question::find($option->question_id);
        if ($question) {
            $option->delete();
            $question->delete();
            return redirect()->route('list')->with('Success', 'Poll has been deleted successfully');
        }
            }
        }catch (\Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
            }
        }



    //Show Vote 
    public function votelist($id){
        try{
        $votes = Option::with('questions')->where('id', $id)->get()->all();
        return view ('Votes.vote', compact('votes'));
        }catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }



    //Vote Store in DB
    public function voteuser(VoteRequest $request){
        try{
    $voteDetails = $request->VoteDetail(); // Get the details from the request
    $email = $voteDetails['email'];
    $questionId = $voteDetails['question_id'];
    
    $existingVote = Voter::where('email', $email)
    ->where('question_id', $questionId)
    ->first();

    if ($existingVote) {
    return response()->json(['message' => 'This email has already been used for this question.'], 422);
    }
    else{
        $vote = Voter::create($request->VoteDetail());
        //call a function
        return $this->resultshow($request->option_id);
        return response()->json(['message' => 'Your response has been recorded'], 200);}
    }catch (\Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }
    }


    //Show Votes Result
    public function resultshow($id){
        try{
        $h = Option::with('questions')->with('votes')->where('id', $id)->get();
        // return $h;
        $option1Result = [];
        $option2Result = [];
        $option3Result = [];
        $option4Result = [];
    
        foreach ($h as $option) {
            $option1Result[] = $option->option1;
            $option2Result[] = $option->option2;
            $option3Result[] = $option->option3;
            $option4Result[] = $option->option4;
        }
        $hello1 = Voter::with('questions')->where('option_id', $id)->whereIn('selected_option', $option1Result)->count();
        $hello2 = Voter::with('questions')->where('option_id', $id)->whereIn('selected_option', $option2Result)->count();
        $hello3 = Voter::with('questions')->where('option_id', $id)->whereIn('selected_option', $option3Result)->count();
        $hello4 = Voter::with('questions')->where('option_id', $id)->whereIn('selected_option', $option4Result)->count();

        return view('Votes.result', compact('hello1', 'hello2', 'hello3', 'hello4', 'h', 'option1Result', 'option2Result', 'option3Result', 'option4Result'));
    }catch (\Exception $e) {
        return redirect()->back()->with('error', $e->getMessage()); }
        }
    }

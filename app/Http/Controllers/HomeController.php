<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VoteRequest;
use App\Http\Requests\PollRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Question;
use App\Models\Voter;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //Show Total Auth User Counts
    public function index()
    {
        try{
        $userdata = auth()->user();
        $userId = Auth::user()->id;
        $votecount = [];
        $questions = Question::where('user_id', $userId)->get();
        if ($questions->isNotEmpty()) {
        $count = 0;
        foreach ($questions as $question) {
        $count += $question->votes()->count(); 
        }
        array_push($votecount, $count);
        }
        // return $votecount;
        return view('dashboard', compact('userdata','votecount'));
    }catch (\Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }
    }
}

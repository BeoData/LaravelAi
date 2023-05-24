<?php

 

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
       // $questions = Question::all();
        $questions = Question::whereNotNull('question')
            ->whereRaw('LENGTH(question) >= 10')
            ->whereRaw('LENGTH(answer) >= 10')
            ->whereRaw('approved == 1')
          
            ->groupBy('question')
            ->get();

        return view('gpt.questions.index', compact('questions'));
    }
}

<?php

 

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
       // $questions = Question::all();
        $question= Question::whereNotNull('question')
            ->whereRaw('LENGTH(question) >= 10')
            ->whereRaw('LENGTH(answer) >= 10')
           // ->whereRaw('approved == 1')
          
            ->groupBy('question')
            ->get();
        $questions =  $question ;
           
        return view('gpt.questions.index', compact('questions'));
    }
}

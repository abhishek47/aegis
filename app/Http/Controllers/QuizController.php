<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Question;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    
    public function get(Quiz $quiz)
    {
    	return $quiz->toJson();
    }


    public function discuss(Quiz $quiz, Question $question)
    {
    	return view('quiz.discuss', compact('quiz', 'question'));
    }


}

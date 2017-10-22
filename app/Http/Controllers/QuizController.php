<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Question;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    
    public function get(Quiz $quiz, $level = null)
    {
    	if(!isset($level))
    	{
    		return $quiz->toJson();
    	} else {
    		return array_merge(['info' => $quiz->attributesToArray()], 
    		        ['questions' => $quiz->questions()->where('level', $level)->get()->toArray()], 
		            ['levels' => $quiz->questions->groupBy('level')->count()]);
    	}
    	
    }


    public function discuss(Quiz $quiz, Question $question)
    {
    	return view('quiz.discuss', compact('quiz', 'question'));
    }


}

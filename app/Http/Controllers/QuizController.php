<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    
    public function get(Quiz $quiz)
    {
    	return $quiz->toJson();
    }


}

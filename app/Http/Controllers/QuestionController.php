<?php

namespace App\Http\Controllers;

use App\User;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function solve()
    {
    	$solving = auth()->user()->solvedQuestions()->save(Question::findOrFail(request()->get('id')), 
    		  ['correct' => request()->get('correct'), 'selectedAnswers' => json_encode(request()->get('userAnswers'))]);

    	return response(['data' => $solving], 200);
    }
}

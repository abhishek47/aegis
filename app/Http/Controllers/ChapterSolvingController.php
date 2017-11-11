<?php

namespace App\Http\Controllers;

use App\ChapterHomework;
use Illuminate\Http\Request;

class ChapterSolvingController extends Controller
{
    public function check(ChapterHomework $homework)
    {
    	$flag = 0;

    	$answers = json_decode($homework->a);

    	if(!auth()->user()->chapterSolvings()->where('chapter_homework_id', $homework->id)->exists())
    	{	
    		$solving = auth()->user()->chapterSolvings()
    		        ->create(['chapter_homework_id' => $homework->id, 'score' => $homework->points, 'attempts' => 3, 'answer' => $answers[0]->option]);
    	}
    	else {
    		$solving = auth()->user()->chapterSolvings()->where('chapter_homework_id', $homework->id)->first();
    	}

		

		$solving->attempts = $solving->attempts - 1;

		if(request('answer') == $answers[0]->option)
		{
			$solving->solved = 1;
			$solving->answer = request('answer');
			$flag = 1;

		} else {
			$solving->score -= 2;
		}

		$solving->save();

		if($flag)
		{
			return response(['msg' => 'correct', 'attempts' => $solving->attempts], 200);

		} else {
			return response(['msg' => 'incorrect', 'attempts' => $solving->attempts], 200);
		}
    }
}

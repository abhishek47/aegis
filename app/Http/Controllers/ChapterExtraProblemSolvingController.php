<?php

namespace App\Http\Controllers;


use App\ChapterExtraProblem;
use App\ChapterExtraProblemSolving;
use Illuminate\Http\Request;

class ChapterExtraProblemSolvingController extends Controller
{
      public function check(ChapterExtraProblem $homework)
    {
        $flag = 0;

        $answers = json_decode($homework->a);

        if(!auth()->user()->extraProblemSolvings()->where('chapter_extra_problem_id', $homework->id)->exists())
        {   
            $solving = auth()->user()->extraProblemSolvings()
                    ->create(['chapter_extra_problem_id' => $homework->id, 'score' => $homework->points, 'attempts' => 0, 'answer' => $answers[0]->option]);
        }
        else {
            $solving = auth()->user()->extraProblemSolvings()->where('chapter_extra_problem_id', $homework->id)->first();
        }

        

        $solving->attempts = $solving->attempts + 1;

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

<?php

namespace App;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class ChapterExtraProblem extends Model
{
	use CrudTrait;
      /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
  

     protected $fillable = ['q', 'a', 'select_any', 'correct', 'incorrect', 'points', 'chapter_id', 'section', 'solution'];

     protected $visible = ['id', 'q', 'a', 'select_any', 'correct', 'incorrect', 'section', 'points'];

     public function chapter()
     {
     	return $this->belongsTo(Chapter::class);
     }

    


     public function isSolved()
     {
     	if(!auth()->user()->extraProblemSolvings()->where('chapter_extra_problem_id', $this->id)->exists())
     	{
     		return false;
     	}

     	$solving = auth()->user()->extraProblemSolvings()->where('chapter_extra_problem_id', $this->id)->first();

     	if($solving->solved)
     	{
     		return true;
     	} else {
     		return false;
     	}
     }

     public function hasAttempts()
     {
     	if(!auth()->user()->extraProblemSolvings()->where('chapter_extra_problem_id', $this->id)->exists())
     	{
     		return true;
     	}

     	$solving = auth()->user()->extraProblemSolvings()->where('chapter_extra_problem_id', $this->id)->first();

     	return $solving->attempts > 0;
     }

    

     public function userSolution()
     {
     	return auth()->user()->extraProblemSolvings()->where('chapter_extra_problem_id', $this->id)->first();
     }
}

<?php

namespace App;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class ChapterHomework extends Model
{
     use CrudTrait;

      /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'due_date'
    ];


     protected $fillable = ['q', 'a', 'select_any', 'correct', 'incorrect', 'chapter_id', 'level', 'solution', 'points', 'due_date', 'week', 'classroom_id'];

     protected $visible = ['id', 'q', 'a', 'select_any', 'correct', 'incorrect', 'level', 'points', 'due_date', 'week'];

     public function chapter()
     {
     	return $this->belongsTo(Chapter::class);
     }

      public function classroom()
     {
        return $this->belongsTo(Classroom::class);
     }


     public function isSolved()
     {
     	if(!auth()->user()->chapterSolvings()->where('chapter_homework_id', $this->id)->exists())
     	{
     		return false;
     	}

     	$solving = auth()->user()->chapterSolvings()->where('chapter_homework_id', $this->id)->first();

     	if($solving->solved)
     	{
     		return true;
     	} else {
     		return false;
     	}
     }

     public function hasAttempts()
     {
     	if(!auth()->user()->chapterSolvings()->where('chapter_homework_id', $this->id)->exists())
     	{
     		return true;
     	}

     	$solving = auth()->user()->chapterSolvings()->where('chapter_homework_id', $this->id)->first();

     	return $solving->attempts > 0;
     }

     public function overDueDate()
     {
     	$first = $this->due_date;
     	$second = \Carbon\Carbon::now();

     	if($first->lte($second))
     	{
     		return true;
     	} 

     	return false;

     	
     }

     public function userSolution()
     {
     	return auth()->user()->chapterSolvings()->where('chapter_homework_id', $this->id)->first();
     }
}

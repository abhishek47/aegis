<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Question extends Model
{
     use CrudTrait;

     

     protected $fillable = ['q', 'a', 'select_any', 'correct', 'incorrect', 'quiz_id', 'level', 'solution'];

      protected $visible = ['id', 'q', 'a', 'select_any', 'correct', 'incorrect', 'level', 'solved', 'solved_correct', 'user_answers'];

      protected $appends = ['solved', 'solved_correct', 'user_answers'];

     public function quiz()
     {
     	return $this->belongsTo(Quiz::class);
     }

     public function comments()
     {
     	return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
     }


     public function getSolvedAttribute()
     {
          return auth()->user()->solvedQuestions->contains($this);
     }

     public function getSolvedCorrectAttribute()
     {
          if($this->solved)
          {
               return auth()->user()->solvedQuestions()->where('question_id', $this->id)->first()->pivot->correct;
          } else {
               return false;
          }
     }

      public function getUserAnswersAttribute()
     {
          if($this->solved)
          {
               return auth()->user()->solvedQuestions()->where('question_id', $this->id)->first()->pivot->selectedAnswers;
          } else {
               return [];
          }
     }

     

}

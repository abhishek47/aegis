<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Question extends Model
{
     use CrudTrait;

     protected $fillable = ['q', 'a', 'select_any', 'correct', 'incorrect', 'quiz_id', 'level', 'solution'];

      protected $visible = ['id', 'q', 'a', 'select_any', 'correct', 'incorrect', 'level'];

     public function quiz()
     {
     	return $this->belongsTo(Quiz::class);
     }

     public function comments()
     {
     	return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
     }

}

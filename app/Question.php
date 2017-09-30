<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Question extends Model
{
     use CrudTrait;

     protected $fillable = ['q', 'a', 'select_any', 'correct', 'incorrect', 'quiz_id'];

      protected $visible = ['id', 'q', 'a', 'select_any', 'correct', 'incorrect'];

     public function quiz()
     {
     	return $this->belongsTo(Quiz::class);
     }
}

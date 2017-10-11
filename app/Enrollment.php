<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Enrollment extends Model
{
    use CrudTrait;

     protected $fillable = ['user_id', 'course_id'];

     public function course()
     {
     	return $this->belongsTo(Course::class);
     }
}

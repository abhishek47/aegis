<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Lecture extends Model
{
    use CrudTrait;

     protected $fillable = ['name', 'description', 'fees', 'duration', 'date', 'start_time', 'active', 'link'];

    public function enrollments()
    {
         return $this->belongsToMany(User::class, 'enrollments', 
            'course_id', 'user_id');
    }



}

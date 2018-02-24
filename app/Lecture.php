<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Lecture extends Model
{
    use CrudTrait;

     protected $fillable = ['name', 'description', 'fees', 'duration', 'date', 'start_time'];

    public function enrollments()
    {
         return $this->belongsToMany(User::class, 'enrollments', 
            'course_id', 'user_id');
    }


    public function showMe($crud = false)
   { 
   	 
   	  
	  	return '<a class="btn btn-xs btn-success" target="_blank"  href="'. $this->link .'" data-toggle="tooltip" title="View Course Details">Preview</a>';
   	 
   	 
   	   
   }
}

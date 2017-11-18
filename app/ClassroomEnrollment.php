<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassroomEnrollment extends Model
{
     protected $fillable = ['user_id', 'classroom_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function classroom()
    {
    	return $this->belongsTo(Classroom::class);
    }
}

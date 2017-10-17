<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable = ['user_id', 'question', 'solution_id'];


     public function comments()
     {
     	return $this->hasMany(Solution::class)->orderBy('created_at', 'desc');
     }

}

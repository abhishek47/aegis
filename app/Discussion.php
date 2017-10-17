<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable = ['title', 'user_id', 'question', 'solution_id'];

      public function user()
   {
   	 return $this->belongsTo(User::class);
   }

     public function comments()
     {
     	return $this->hasMany(Solution::class)->orderBy('created_at', 'desc');
     }

}

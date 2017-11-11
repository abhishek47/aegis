<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChapterSolving extends Model
{

	protected $fillable = ['chapter_homework_id', 'score', 'user_id', 'solved', 'attempts', 'answer'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}

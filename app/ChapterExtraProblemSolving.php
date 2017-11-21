<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChapterExtraProblemSolving extends Model
{
    protected $fillable = ['chapter_extra_problem_id', 'score', 'user_id', 'solved', 'attempts', 'answer'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}

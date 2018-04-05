<?php

namespace App;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class BookChapterProblem extends Model
{

    use CrudTrait;

    protected $fillable = ['question', 'solution', 'book_chapter_id'];


    public function bookchapter()
    {
    	return $this->belongsTo(BookChapter::class, 'book_chapter_id');
    }


}

<?php

namespace App;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class BookChapter extends Model
{
    use CrudTrait;

    protected $fillable = ['title', 'short_description', 'description', 'book_id'];



    public function problems()
    {
      return $this->hasMany(BookChapterProblem::class);
    }

   

    public function book()
    {
    	return $this->belongsTo(Book::class);
    }

    public function manageQuestions($crud = false)
   	{ 
   	 
   	  	return '<a class="btn btn-xs btn-success" href="/admin/book-chapter-problems/bookchapter:' . $this->id . '" data-toggle="tooltip" title="View Questions">Questions</a>';
   	   
   	}

  }

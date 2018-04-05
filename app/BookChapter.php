<?php

namespace App;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class BookChapter extends Model
{
    use CrudTrait;

    protected $fillable = ['title', 'short_description', 'description'];



    public function problems()
    {
      return $this->hasMany(BookChapterProblem::class);
    }

   

    public function book()
    {
    	return $this->belongsTo(Book::class);
    }

  }

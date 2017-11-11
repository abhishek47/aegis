<?php

namespace App;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class ChapterMessage extends Model
{
    use CrudTrait;

    protected $fillable = ['body', 'chapter_id'];


    public function chapter()
    {
    	return $this->belongsTo(Chapter::class);
    }
}

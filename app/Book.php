<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Book extends Model
{
    use CrudTrait;

 

     protected $fillable = ['title', 'image', 'short_description', 'description', 'authors', 'tags'];

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "s3";
        $destination_path = "books/covers";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

    public function manageChapters($crud = false)
   	{ 
   	 
   	  	return '<a class="btn btn-xs btn-success" href="/admin/bookchapters/book:' . $this->id . '" data-toggle="tooltip" title="View Chapters">Chapters</a>';
   	   
   	}

}

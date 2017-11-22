<?php

namespace App;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
	use CrudTrait;

    protected $fillable = ['title', 'description', 'summary', 'price', 'weeks', 'contents', 'need', 'ready'];

    public function chapters()
    {
    	return $this->hasMany(Chapter::class)->orderBy('index');
    }

    public function likes()
    {
      return $this->hasMany(ClassroomLike::class);
    }

    public function enrollments()
    {
      return $this->hasMany(ClassroomEnrollment::class);
    }

    public function manageChapters($crud = false)
   	{ 
   	 
   	  
	  	return '<a class="btn btn-xs btn-success" target="_blank"  href="/classrooms/' . $this->id . '" data-toggle="tooltip" title="View Course Details">Chapters</a>';
   	   
   	}


    public function homeworks()
    {
      return $this->hasMany(ChapterHomework::class);
    }


    public function setContentsAttribute($value)
    {
        $attribute_name = "contents";
        $disk = "s3";
        $destination_path = "uploads/files";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

     public function setNeedAttribute($value)
    {
        $attribute_name = "need";
        $disk = "s3";
        $destination_path = "uploads/files";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

     public function setReadyAttribute($value)
    {
        $attribute_name = "ready";
        $disk = "s3";
        $destination_path = "uploads/files";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

}

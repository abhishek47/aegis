<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Venturecraft\Revisionable\RevisionableTrait;

class Wiki extends Model
{
   use CrudTrait;
   use RevisionableTrait;

   protected $fillable = ['title', 'body', 'category_id'];


   public function publishWiki($crud = false)
   { 
   	 if(auth()->user()->hasRole('administrator'))
   	 {
   	  if($this->published)
   	  {
   	  	return '<a class="btn btn-xs btn-primary"  href="/wiki/publish/'. $this->id .'" data-toggle="tooltip" title="Unpublish the wiki page from public"><i class="fa fa-search"></i> Unpublish</a>';
   	  } else {
   	  	return '<a class="btn btn-xs btn-primary"  href="/wiki/publish/'. $this->id .'" data-toggle="tooltip" title="Publish the wiki page to public">Publish</a>';
   	  }
   	 } 
   	   
   }

   public function previewWiki($crud = false)
   { 
   	 
   	  
	  	return '<a class="btn btn-xs btn-success" target="_blank"  href="/wiki/preview/'. $this->id .'" data-toggle="tooltip" title="Preview your wiki page">Preview</a>';
   	 
   	 
   	   
   }

   public function changeActiveWiki($crud = false)
   { 
     
     if(\Config::get('settings.wiki_of_week') === $this->id)
     {

         return '<a class="btn btn-xs btn-success btn-disabled"  href="/wiki/active/'. $this->id .'" data-toggle="tooltip" title="Change wiki of week">Wiki of Week</a>';

     } else {

         return '<a class="btn btn-xs btn-danger"  href="/wiki/active/'. $this->id .'" data-toggle="tooltip" title="Change wiki of week">Wiki of Week</a>';

     }

     
         
   }
}

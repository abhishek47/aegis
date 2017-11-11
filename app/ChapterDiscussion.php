<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChapterDiscussion extends Model
{
     protected $fillable = ['user_id', 'message', 'chapter_id', 'likes', 'dislikes'];

    public function user()
   {
   	 return $this->belongsTo(User::class);
   }

   public function chapter()
   {
   	 return $this->belongsTo(Chapter::class);
   }
}

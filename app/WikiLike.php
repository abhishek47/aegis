<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WikiLike extends Model
{
    protected $fillable = ['user_id', 'wiki_id'];

    protected $table = 'wiki_likes';
}

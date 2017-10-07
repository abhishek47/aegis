<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Wiki extends Model
{
   use CrudTrait;

   protected $fillable = ['title', 'body'];
}

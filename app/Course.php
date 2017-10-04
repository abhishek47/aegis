<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Course extends Model
{
    use CrudTrait;

     protected $fillable = ['name', 'body', 'fees', 'days', 'duration', 'type'];
}

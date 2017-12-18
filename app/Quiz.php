<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Quiz extends Model
{

	use CrudTrait;

    protected $fillable = ['name', 'main', 'problemofweek', 'start_date', 'end_date'];

    protected $with = ['questions'];

    protected $visible = ['id', 'name', 'main', 'questions'];

    public function questions()
    {
    	return $this->hasMany(Question::class);
    } 

     public function manageQuestions($crud = false)
    { 
     
      
        return '<a class="btn btn-xs btn-success" href="/admin/questions/quiz:' . $this->id . '" data-toggle="tooltip" title="Manage Questions">Questions</a>';
       
    }

    public function manageWeeklyQuestions($crud = false)
    { 
     
      
        return '<a class="btn btn-xs btn-success" href="/admin/weekly-questions/problem:' . $this->id . '" data-toggle="tooltip" title="Manage Questions">Questions</a>';
       
    }

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return array_merge(['info' => $this->attributesToArray()], $this->relationsToArray(),
                           ['levels' => $this->questions->groupBy('level')->count()]);
    }
}

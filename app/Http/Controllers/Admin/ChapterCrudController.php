<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Illuminate\Http\Request;

class ChapterCrudController extends CrudController {

	public function setup() {
        $this->crud->setModel("App\Chapter");
        $this->crud->setRoute("admin/chapters");
        $this->crud->setEntityNameStrings('chapter', 'chapters');

        $this->crud->setColumns([
        	 [
			'name' => 'title',
			'label' => "Title",

			],
			[
				'name' => 'date',
				'label' => 'Date of Lecture'
			],
			[
				'name' => 'duration',
				'label' => 'Duration ( in min )'
			]
			


	]);
        $this->crud->addFields([
        	 [
			'name' => 'title',
			'label' => "Title",
			],
			['name' => 'description',
			'label' => "What is taught in the chapter",
			'type' => 'textarea'],
			[
			'name' => 'begin_time',
			'label' => "Lecture Start Time",
			'type' => "time",
			],
			[
			'name' => 'date',
			'label' => "Lecture Date",
			'type' => "date",
			],	
			 [
			'name' => 'duration',
			'label' => "Duration ( in minutes )",
			'type' => "number",
			],
			
			[  // Select2
			   'label' => "Classroom",
			   'type' => 'select2',
			   'name' => 'classroom_id', // the db column for the foreign key
			   'entity' => 'classroom', // the method that defines the relationship in your Model
			   'attribute' => 'title', // foreign key attribute that is shown to user
			   'model' => "App\Classroom", // foreign key model
			   'allows_null' => false
			]


	]);


         $this->crud->addButtonFromModelFunction('line', 'session', 'enterSession', 'end');

    }

	public function store(Request $request)
	{
		
		return parent::storeCrud();
	}

	public function update(Request $request)
	{
		

		return parent::updateCrud();
	}
}
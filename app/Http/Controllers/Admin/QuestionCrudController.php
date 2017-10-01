<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Illuminate\Http\Request;

class QuestionCrudController extends CrudController {

	public function setup() {
        $this->crud->setModel("App\Question");
        $this->crud->setRoute("admin/questions");
        $this->crud->setEntityNameStrings('question', 'questions');

        $this->crud->setColumns([
        	 [
			'name' => 'q',
			'label' => "Question"
			],
			['name' => 'a',
			'label' => "Answer"]


	]);
        $this->crud->addFields([
        	 [
			'name' => 'q',
			'label' => "Question"
			],
			[ // Table
			    'name' => 'a',
			    'label' => 'Answers',
			    'type' => 'table',
			    'entity_singular' => 'Option', // used on the "Add X" button
			    'columns' => [
			            ['name' => 'option',
						'label' => "Option",
						'type' => 'text'],
						['name' => 'correct',
						'label' => "Is Answer",
						'type' => "checkbox"]
			    ],
			    'max' => 4, // maximum rows allowed in the table
			    'min' => 0 // minimum rows allowed in the table
			],
			['name' => 'select_any',
			'label' => "For Multiple Answers (Select Single : checked, Select All : unchecked)",
			'type' => 'checkbox'],
			['name' => 'correct',
			'label' => "Response on Correct Answer",
			'type' => 'textarea'],
			['name' => 'incorrect',
			'label' => "Response on Incorrect Answer",
			'type' => 'textarea'],
			['name' => 'solution',
			'label' => "Solution",
			'type' => 'textarea'],
			['name' => 'level',
			'label' => "Level",
			'type' => 'select_from_array',
		    'options' => [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10],
		    'allows_null' => false,],
			[  // Select2
			   'label' => "Quiz",
			   'type' => 'select2',
			   'name' => 'quiz_id', // the db column for the foreign key
			   'entity' => 'quiz', // the method that defines the relationship in your Model
			   'attribute' => 'name', // foreign key attribute that is shown to user
			   'model' => "App\Quiz" // foreign key model
			]


	]);
    }

	public function store(Request $request)
	{
		$request->validate(['q' => 'required', 'a' => 'required', 'correct' => 'required', 
			                       'incorrect' => 'required', 'solution' => 'required', 'level' => 'required'

			]);
		return parent::storeCrud();
	}

	public function update(Request $request)
	{
		$request->validate(['q' => 'required', 'a' => 'required', 'correct' => 'required', 
			                       'incorrect' => 'required', 'solution' => 'required', 'level' => 'required'

			]);

		return parent::updateCrud();
	}
}
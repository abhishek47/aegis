<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Illuminate\Http\Request;

class ChapterExtraProblemCrudController extends CrudController {

	public function setup() {
        $this->crud->setModel("App\ChapterExtraProblem");
        $this->crud->setRoute("admin/extra-practice-problems");
        $this->crud->setEntityNameStrings('Extra Practice Problem', 'Extra Practice Problems');

        $this->crud->setColumns([
        	 [
			'name' => 'q',
			'label' => "Question"
			]
			


	]);
        $this->crud->addFields([
        	 [
			'name' => 'q',
			'label' => "Question",
			'type' => 'editor'
			],
			[
			'name' => 'points',
			'label' => "Points",
			'type' => 'number'
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
			    'max' => 1, // maximum rows allowed in the table
			    'min' => 0 // minimum rows allowed in the table
			],
			
			['name' => 'correct',
			'label' => "Response on Correct Answer",
			'default' => '<span>Your Answer is Correct!</span>',
			'type' => 'hidden'],
			['name' => 'incorrect',
			'label' => "Response on Incorrect Answer",
			'default' => '<span>Your Answer is Incorrect!</span>',
			'type' => 'hidden'],
			['name' => 'solution',
			'label' => "Solution",
			'type' => 'editor2'],
			['name' => 'section',
			'label' => "Section",
			'type' => 'select_from_array',
		    'options' => [0 => 0, 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10],
		    'allows_null' => false,],
			[  // Select2
			   'label' => "Chapter",
			   'type' => 'select2',
			   'name' => 'chapter_id', // the db column for the foreign key
			   'entity' => 'chapter', // the method that defines the relationship in your Model
			   'attribute' => 'title', // foreign key attribute that is shown to user
			   'model' => "App\Chapter", // foreign key model
			   'allows_null' => false
			],
			 


	]);

    }

	public function store(Request $request)
	{
		$request->validate(['q' => 'required', 'a' => 'required', 'correct' => 'required', 
			                       'incorrect' => 'required', 'solution' => 'required', 'section' => 'required'

			]);
		return parent::storeCrud();
	}

	public function update(Request $request)
	{
		$request->validate(['q' => 'required', 'a' => 'required', 'correct' => 'required', 
			                       'incorrect' => 'required', 'solution' => 'required', 'section' => 'required'

			]);

		return parent::updateCrud();
	}
}
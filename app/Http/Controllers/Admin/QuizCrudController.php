<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Illuminate\Http\Request;

class QuizCrudController extends CrudController {

	public function setup() {
        $this->crud->setModel("App\Quiz");
        $this->crud->setRoute("admin/quiz");
        $this->crud->setEntityNameStrings('quiz', 'quizzes');

        $this->crud->setColumns(['name', 'main']);
        $this->crud->addFields([
        	 [
			'name' => 'name',
			'label' => "Quiz name"
			],
			['name' => 'main',
			'label' => "Quiz Description"]


	]);

         $this->crud->allowAccess('show');

         $this->crud->with('questions');

         $this->crud->setEditView('quiz.edit');
    }

	public function store(Request $request)
	{
		$request->validate(['name' => 'required', 'main' => 'required'

			]);

		return parent::storeCrud();
	}

	public function update(Request $request)
	{

		$request->validate(['name' => 'required', 'main' => 'required' ]);
		return parent::updateCrud();
	}
}
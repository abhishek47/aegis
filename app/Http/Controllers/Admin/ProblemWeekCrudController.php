<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Illuminate\Http\Request;

class ProblemWeekCrudController extends CrudController {

	public function setup() {
        $this->crud->setModel("App\Quiz");
        $this->crud->setRoute("admin/problems-of-week");
        $this->crud->setEntityNameStrings('problem', 'problems');

        $this->crud->setColumns(['name', 'main']);
        $this->crud->addFields([
        	 [
			'name' => 'name',
			'label' => "Quiz name"
			],
			['name' => 'main',
			'label' => "Quiz Description"],
			['name' => 'problemofweek',
			'label' => "Is Problem of Week",
			'type'  => 'hidden',
			'value' => 1],
			['name' => 'start_date',
			'label' => "Week Start Date",
			'type'  => 'date'],
			['name' => 'end_date',
			'label' => "Week End Date",
			'type'  => 'date']


	]);

        $this->crud->addClause('where', 'problemofweek', '=', 1);


         $this->crud->with('questions');


         $this->crud->addButtonFromModelFunction('line', 'questions', 'manageWeeklyQuestions', 'end');


		  $this->crud->allowAccess('show');
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
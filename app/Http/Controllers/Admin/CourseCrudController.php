<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Illuminate\Http\Request;

class CourseCrudController extends CrudController {

	public function setup() {
        $this->crud->setModel("App\Course");
        $this->crud->setRoute("admin/courses");
        $this->crud->setEntityNameStrings('course', 'courses');

        $this->crud->setColumns([
        	 [
			'name' => 'name',
			'label' => "Course Name"
			],
			['name' => 'created_at',
			'label' => "Course Created on"]


	]);
        $this->crud->addFields([
        	 [
			'name' => 'name',
			'label' => "Course Name"
			],
			['name' => 'body',
			'label' => "Course Description",
			'type' => 'summernote'],
			['name' => 'fees',
			'label' => "Course Fees (Enter 0 for free )",
			'type' => 'number'],
			['name' => 'days',
			'label' => "Number of Days",
			'type' => 'number'],
			['name' => 'duration',
			'label' => "Course Duration ( in hrs )",
			'type' => 'number'],
			['name' => 'type',
			'label' => "Online/Offline",
			'type' => 'select2_from_array',
			'options' => ['0' => 'Offline', '1' => 'Online'],
            'allows_null' => false]
			


	]);


         $this->crud->with('enrollments');


         $this->crud->allowAccess('show');

         $this->crud->setShowView('admin.wikis.show');
    }

    

	public function store(Request $request)
	{
		$request->validate(['name' => 'required', 'body' => 'required', 'fees' => 'required', 
			                       'days' => 'required', 'duration' => 'required'

			]);
		return parent::storeCrud();
	}

	public function update(Request $request)
	{
		$request->validate(['name' => 'required', 'body' => 'required', 'fees' => 'required', 
			                       'days' => 'required', 'duration' => 'required'

			]);

		return parent::updateCrud();
	}
}
<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Illuminate\Http\Request;

class ClassroomCrudController extends CrudController {

	public function setup() {
        $this->crud->setModel("App\Classroom");
        $this->crud->setRoute("admin/classrooms");
        $this->crud->setEntityNameStrings('classroom', 'classrooms');

        $this->crud->setColumns([
        	 [
			'name' => 'title',
			'label' => "Classroom Title"
			],
			['name' => 'created_at',
			'label' => "Classroom Created on"]


	]);
        $this->crud->addFields([
        	 [
			'name' => 'title',
			'label' => "Title"
			],
			['name' => 'description',
			'label' => "Description ( 3 - 4 lines description )",
			'type' => 'textarea'],
			['name' => 'summary',
			'label' => "Summary",
			'type' => 'editor'],
			['name' => 'price',
			'label' => "Fees (Enter 0 for free )",
			'type' => 'number'],
			['name' => 'weeks',
			'label' => "No. of Weeks",
			'type' => 'number'],
			[   // Upload
			    'name' => 'contents',
			    'label' => 'Table of Contents',
			    'type' => 'upload',
			    'upload' => true,
			    'disk' => 's3' // if you store files in the /public folder, please ommit this; if you store them in /storage or S3, please specify it;
			],
			[   // Upload
			    'name' => 'need',
			    'label' => 'Do i need it?',
			    'type' => 'upload',
			    'upload' => true,
			    'disk' => 's3' // if you store files in the /public folder, please ommit this; if you store them in /storage or S3, please specify it;
			],
			[   // Upload
			    'name' => 'ready',
			    'label' => 'Are you ready?',
			    'type' => 'upload',
			    'upload' => true,
			    'disk' => 's3' // if you store files in the /public folder, please ommit this; if you store them in /storage or S3, please specify it;
			],		
				


	]);

        $this->crud->addButtonFromModelFunction('line', 'chapters', 'manageChapters', 'end');

         $this->crud->with('chapters');


         $this->crud->allowAccess('show');

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
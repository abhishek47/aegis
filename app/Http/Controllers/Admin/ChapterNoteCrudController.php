<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Illuminate\Http\Request;

class ChapterNoteCrudController extends CrudController {

	public function setup() {
        $this->crud->setModel("App\ChapterNote");
        $this->crud->setRoute("admin/chapter-notes");
        $this->crud->setEntityNameStrings('Chapter Note', 'Chapter Notes');

        $this->crud->setColumns(['body', 'created_at']);
        $this->crud->addFields([
        	 [
			'name' => 'body',
			'label' => "Messages",
			'type' => "editor"
 			],
			[  // Select2
			   'label' => "Chapter",
			   'type' => 'select2',
			   'name' => 'chapter_id', // the db column for the foreign key
			   'entity' => 'chapter', // the method that defines the relationship in your Model
			   'attribute' => 'title', // foreign key attribute that is shown to user
			   'model' => "App\Chapter", // foreign key model
			   'allows_null' => false
			]


	]);



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
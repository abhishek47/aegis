<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Quiz;
use Illuminate\Http\Request;

class WikiCrudController extends CrudController {

	public function setup() {
        $this->crud->setModel("App\Wiki");
        $this->crud->setRoute("admin/wikis");
        $this->crud->setEntityNameStrings('wiki', 'wikis');

        $this->crud->setColumns(['title', 'created_at']);
        $this->crud->addFields([
        	 [
			'name' => 'title',
			'label' => "Wiki Page Title"
			],
			['name' => 'body',
			'label' => "Page Body",
			'type' => 'editor']


	]);

         $this->crud->addButtonFromModelFunction('line', 'publish', 'publishWiki', 'end');

         $this->crud->addButtonFromModelFunction('line', 'preview', 'previewWiki', 'end');

         $this->crud->allowAccess('revisions');

         $this->crud->with('revisionHistory');


         $this->crud->allowAccess('show');

         

      
    }

	public function store(Request $request)
	{
		$request->validate(['title' => 'required', 'body' => 'required'

			]);

		return parent::storeCrud();
	}

	public function update(Request $request)
	{

		$request->validate(['title' => 'required', 'body' => 'required' ]);
		return parent::updateCrud();
	}
}
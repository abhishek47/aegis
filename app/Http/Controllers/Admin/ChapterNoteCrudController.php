<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Illuminate\Http\Request;

use App\Chapter;

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
			

	]);

		if(request()->has('chapter'))
        {
        	$this->crud->addField([  // Select2
			   'label' => "Chapter",
			   'type' => 'select2',
			   'name' => 'chapter_id', // the db column for the foreign key
			   'entity' => 'chapter', // the method that defines the relationship in your Model
			   'attribute' => 'title', // foreign key attribute that is shown to user
			   'model' => "App\Chapter", // foreign key model
			   'allows_null' => false,
			   'value' => request('chapter')
			]);
        } else {
        	$this->crud->addField([  // Select2
			   'label' => "Chapter",
			   'type' => 'select2',
			   'name' => 'chapter_id', // the db column for the foreign key
			   'entity' => 'chapter', // the method that defines the relationship in your Model
			   'attribute' => 'title', // foreign key attribute that is shown to user
			   'model' => "App\Chapter", // foreign key model
			   'allows_null' => false
			]);
        }

		$this->crud->limit(1);


    }

    /**
     * Display all rows in the database for this entity.
     *
     * @return Response
     */
    public function get(Chapter $chapter)
    {
        $this->crud->hasAccessOrFail('list');

        $this->crud->addClause('where', 'chapter_id', '=', $chapter->id);

        $this->crud->setListView('admin.chapters.edits.list');

        $this->data['crud'] = $this->crud;
        $this->data['title'] = $this->crud->entity_name_plural . ' | ' . $chapter->title;

        // get all entries if AJAX is not enabled
        if (! $this->data['crud']->ajaxTable()) {
            $this->data['entries'] = $this->data['crud']->getEntries();
        }

        $this->data['chapter'] = $chapter;

        $this->data['limit'] = 1;

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view($this->crud->getListView(), $this->data);
    }

    /**
     * Show the form for creating inserting a new row.
     *
     * @return Response
     */
    public function create()
    {
        $this->crud->hasAccessOrFail('create');


        $this->crud->setRoute("admin/chapter-notes/chapter:".request('chapter'));

        $this->crud->setCreateView('admin.chapters.edits.create');


        // prepare the fields you need to show
        $this->data['crud'] = $this->crud;
        $this->data['saveAction'] = $this->getSaveAction();
        $this->data['fields'] = $this->crud->getCreateFields();
        $this->data['title'] = trans('backpack::crud.add').' '.$this->crud->entity_name;

        $this->data['chapter'] = Chapter::findOrFail(request('chapter'));

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view($this->crud->getCreateView(), $this->data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $this->crud->hasAccessOrFail('update');

        

        $this->crud->setEditView('admin.chapters.edits.edit');

        // get the info for that entry
        $this->data['entry'] = $this->crud->getEntry($id);
        $this->data['crud'] = $this->crud;
        $this->data['saveAction'] = $this->getSaveAction();
        $this->data['fields'] = $this->crud->getUpdateFields($id);
        $this->data['title'] = trans('backpack::crud.edit').' '.$this->crud->entity_name;

        $this->data['id'] = $id;

        $this->data['chapter'] = $this->data['entry']->chapter;

        $this->crud->setRoute("admin/chapter-notes/chapter:".$this->data['entry']->chapter->id);

       

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view($this->crud->getEditView(), $this->data);
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
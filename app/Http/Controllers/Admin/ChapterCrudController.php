<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Illuminate\Http\Request;

use App\Classroom;

class ChapterCrudController extends CrudController {

	public function setup() {
        $this->crud->setModel("App\Chapter");
        $this->crud->setRoute("admin/chapters");
        $this->crud->setEntityNameStrings('chapter', 'chapters');

        $this->crud->setColumns([
        	[
			'name' => 'index',
			'label' => "Topic Number"
			],
        	 [
			'name' => 'title',
			'label' => "Title"

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
			'name' => 'index',
			'label' => "Topic Number",
			'type' => "number",
			],
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
			 [
			'name' => 'week',
			'label' => "Week",
			'type' => "number",
			],

			


	]);

        if(request()->has('classroom'))
        {
        	$this->crud->addField([  // Select2
			   'label' => "Classroom",
			   'type' => 'select2',
			   'name' => 'classroom_id', // the db column for the foreign key
			   'entity' => 'classroom', // the method that defines the relationship in your Model
			   'attribute' => 'title', // foreign key attribute that is shown to user
			   'model' => "App\Classroom", // foreign key model
			   'allows_null' => false,
			   'value' => request('classroom')
			  
			]);
        } else {
        	$this->crud->addField([  // Select2
			   'label' => "Classroom",
			   'type' => 'select2',
			   'name' => 'classroom_id', // the db column for the foreign key
			   'entity' => 'classroom', // the method that defines the relationship in your Model
			   'attribute' => 'title', // foreign key attribute that is shown to user
			   'model' => "App\Classroom", // foreign key model
			   'allows_null' => false
			   
			]);
        }


         $this->crud->addButtonFromModelFunction('line', 'session', 'enterSession', 'end');

         $this->crud->enableExportButtons();

         $this->crud->allowAccess('show');

          $this->crud->setShowView('admin.chapters.show');
    }

  	/**
     * Display all rows in the database for this entity.
     *
     * @return Response
     */
    public function getChapters(Classroom $classroom)
    {
        $this->crud->hasAccessOrFail('list');

        $this->crud->addClause('where', 'classroom_id', '=', $classroom->id);

        $this->crud->setListView('admin.chapters.list');

        $this->data['crud'] = $this->crud;
        $this->data['title'] = 'Chapters' . ' | ' . $classroom->title;

        // get all entries if AJAX is not enabled
        if (! $this->data['crud']->ajaxTable()) {
            $this->data['entries'] = $this->data['crud']->getEntries();
        }

        $this->data['classroom'] = $classroom;

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


        $this->crud->setRoute("admin/chapters/classroom:".request('classroom'));

        $this->crud->setCreateView('admin.chapters.create');


        // prepare the fields you need to show
        $this->data['crud'] = $this->crud;
        $this->data['saveAction'] = $this->getSaveAction();
        $this->data['fields'] = $this->crud->getCreateFields();
        $this->data['title'] = trans('backpack::crud.add').' '.$this->crud->entity_name;

        $this->data['classroom'] = Classroom::findOrFail(request('classroom'));

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

        

        $this->crud->setEditView('admin.chapters.edit');

        // get the info for that entry
        $this->data['entry'] = $this->crud->getEntry($id);
        $this->data['crud'] = $this->crud;
        $this->data['saveAction'] = $this->getSaveAction();
        $this->data['fields'] = $this->crud->getUpdateFields($id);
        $this->data['title'] = trans('backpack::crud.edit').' '.$this->crud->entity_name;

        $this->data['id'] = $id;

        $this->data['classroom'] = $this->data['entry']->classroom;

        $this->crud->setRoute("admin/chapters/classroom:".$this->data['entry']->classroom->id);

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
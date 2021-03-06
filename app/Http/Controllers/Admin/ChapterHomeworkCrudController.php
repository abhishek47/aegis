<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Illuminate\Http\Request;

use App\Chapter;

class ChapterHomeworkCrudController extends CrudController {

	public function setup() {
        $this->crud->setModel("App\ChapterHomework");
        $this->crud->setRoute("admin/chapter-homework");
        $this->crud->setEntityNameStrings('Homework Question', 'Homework Questions');

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
			[
			'name' => 'due_date',
			'label' => "Due Date",
			'type' => 'date'
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
			['name' => 'select_any',
			'label' => "For Multiple Answers (Select Single : checked, Select All : unchecked)",
			'type' => 'checkbox'],
			['name' => 'correct',
			'label' => "Response on Correct Answer",
			'default' => '<span>Your Answer is Correct!</span>',
			'type' => 'textarea'],
			['name' => 'incorrect',
			'label' => "Response on Incorrect Answer",
			'default' => '<span>Your Answer is Incorrect!</span>',
			'type' => 'textarea'],
			['name' => 'solution',
			'label' => "Solution",
			'type' => 'editor2'],
			['name' => 'level',
			'label' => "Level",
			'type' => 'select_from_array',
		    'options' => [0 => 0, 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10],
		    'allows_null' => false,],
			
			 


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


        $this->crud->setRoute("admin/chapter-homework/chapter:".request('chapter'));

        $this->crud->setCreateView('admin.chapters.edits.create');


        // prepare the fields you need to show
        $this->data['crud'] = $this->crud;
        $this->data['saveAction'] = $this->getSaveAction();
        $this->data['fields'] = $this->crud->getCreateFields();
        $this->data['title'] = trans('backpack::crud.add').' '.$this->crud->entity_name;

        $this->data['chapter'] = Chapter::findOrFail(request('chapter'));

        $this->data['post_url'] = 'chapter-homework';

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

        $this->crud->setRoute("admin/chapter-homework/chapter:".$this->data['entry']->chapter->id);

       $this->data['post_url'] = 'chapter-homework';

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view($this->crud->getEditView(), $this->data);
    }

     /**
     * Redirect to the correct URL, depending on which save action has been selected.
     * @param  [type] $itemId [description]
     * @return [type]         [description]
     */
    public function performSaveAction($itemId = null)
    {
        $saveAction = \Request::input('save_action', config('backpack.crud.default_save_action', 'save_and_back'));
        $itemId = $itemId ? $itemId : \Request::input('id');

        switch ($saveAction) {
            case 'save_and_new':
                $redirectUrl = 'admin/'. 'chapter-homework' . '/create?chapter='. $this->crud->entry->chapter->id;
                break;
            case 'save_and_edit':
                $redirectUrl = 'admin/chapter-homework'.'/'.$itemId.'/edit';
                if (\Request::has('locale')) {
                    $redirectUrl .= '?locale='.\Request::input('locale');
                }
                break;
            case 'save_and_back':
            default:
                $redirectUrl = 'admin/'. 'chapter-homework' . '/chapter:' . $this->crud->entry->chapter->id;
                break;
        }

        return \Redirect::to($redirectUrl);
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
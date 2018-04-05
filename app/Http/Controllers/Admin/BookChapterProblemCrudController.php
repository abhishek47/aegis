<?php

namespace App\Http\Controllers\Admin;


use App\Book;
use App\BookChapter;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\Book_chapter_problemRequest as StoreRequest;
use App\Http\Requests\Book_chapter_problemRequest as UpdateRequest;

class BookChapterProblemCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\BookChapterProblem');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/book-chapter-problems');
        $this->crud->setEntityNameStrings('Book Chapter Problem', 'Book Chapter Problems');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        $this->crud->setColumns([
             [
            'name' => 'question',
            'label' => "Question"
            ]
            


    ]);
        $this->crud->addFields([
             [
            'name' => 'question',
            'label' => "Question",
            'type' => 'editor'
            ],
            
            ['name' => 'solution',
            'label' => "Solution",
            'type' => 'editor2'],
            
             


    ]);

        if(request()->has('bookchapter'))
        {
            $this->crud->addField([  // Select2
               'label' => "Book Chapter",
               'type' => 'select2',
               'name' => 'book_chapter_id', // the db column for the foreign key
               'entity' => 'bookchapter', // the method that defines the relationship in your Model
               'attribute' => 'title', // foreign key attribute that is shown to user
               'model' => "App\BookChapter", // foreign key model
               'allows_null' => false,
               'value' => request('bookchapter')
            ]);
        } else {
            $this->crud->addField([  // Select2
               'label' => "Book Chapter",
               'type' => 'select2',
               'name' => 'book_chapter_id', // the db column for the foreign key
               'entity' => 'bookchapter', // the method that defines the relationship in your Model
               'attribute' => 'title', // foreign key attribute that is shown to user
               'model' => "App\BookChapter", // foreign key model
               'allows_null' => false
            ]);
        }

    }

    /**
     * Display all rows in the database for this entity.
     *
     * @return Response
     */
    public function get(BookChapter $bookchapter)
    {
        $this->crud->hasAccessOrFail('list');

        $this->crud->addClause('where', 'book_chapter_id', '=', $bookchapter->id);

        $this->crud->setListView('admin.bookchapters.edits.list');

        $this->data['crud'] = $this->crud;
        $this->data['title'] = $this->crud->entity_name_plural . ' | ' . $bookchapter->title;

        // get all entries if AJAX is not enabled
        if (! $this->data['crud']->ajaxTable()) {
            $this->data['entries'] = $this->data['crud']->getEntries();
        }

        $this->data['bookchapter'] = $bookchapter;

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


        $this->crud->setRoute("admin/book-chapter-problems/bookchapter:".request('bookchapter'));

        $this->crud->setCreateView('admin.bookchapters.edits.create');


        // prepare the fields you need to show
        $this->data['crud'] = $this->crud;
        $this->data['saveAction'] = $this->getSaveAction();
        $this->data['fields'] = $this->crud->getCreateFields();
        $this->data['title'] = trans('backpack::crud.add').' '.$this->crud->entity_name;

        $this->data['bookchapter'] = BookChapter::findOrFail(request('bookchapter'));

        $this->data['post_url'] = 'book-chapter-problems';

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view($this->crud->getCreateView(), $this->data);
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
                $redirectUrl = 'admin/'. 'book-chapter-problems' . '/create?bookchapter='. $this->crud->entry->bookchapter->id;
                break;
            case 'save_and_edit':
                $redirectUrl = 'admin/book-chapter-problems'.'/'.$itemId.'/edit';
                if (\Request::has('locale')) {
                    $redirectUrl .= '?locale='.\Request::input('locale');
                }
                break;
            case 'save_and_back':
            default:
                $redirectUrl = 'admin/'. 'book-chapter-problems' . '/bookchapter:' . $this->crud->entry->bookchapter->id;
                break;
        }

        return \Redirect::to($redirectUrl);
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

        

        $this->crud->setEditView('admin.bookchapters.edits.edit');

        // get the info for that entry
        $this->data['entry'] = $this->crud->getEntry($id);
        $this->data['crud'] = $this->crud;
        $this->data['saveAction'] = $this->getSaveAction();
        $this->data['fields'] = $this->crud->getUpdateFields($id);
        $this->data['title'] = trans('backpack::crud.edit').' '.$this->crud->entity_name;

        $this->data['id'] = $id;

        $this->data['bookchapter'] = $this->data['entry']->bookchapter;

        $this->crud->setRoute("admin/book-chapter-problems/bookchapter:".$this->data['entry']->bookchapter->id);

        $this->data['post_url'] = 'book-chapter-problems';

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view($this->crud->getEditView(), $this->data);
    }



    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}

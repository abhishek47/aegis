<?php

namespace App\Http\Controllers\Admin;


use App\Book;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\Book_chapterRequest as StoreRequest;
use App\Http\Requests\Book_chapterRequest as UpdateRequest;

class BookChapterCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\BookChapter');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/bookchapters');
        $this->crud->setEntityNameStrings('Chapter', 'Chapters');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        
         $this->crud->setColumns([
            
            [
            
            'name' => 'title',
            'label' => "Title"

            ],
        ]);

        $this->crud->addFields([
            
            

             [
            'name' => 'title',
            'label' => "Title",
            ],

             ['name' => 'short_description',
            'label' => "Describe in short",
            'type' => 'textarea'],

            ['name' => 'description',
            'label' => "Describe the chapter in brief (optional)",
            'type' => 'editor'],
           
            
            


    ]);


        if(request()->has('book'))
        {
            $this->crud->addField([  // Select2
               'label' => "Book",
               'type' => 'select2',
               'name' => 'book_id', // the db column for the foreign key
               'entity' => 'book', // the method that defines the relationship in your Model
               'attribute' => 'title', // foreign key attribute that is shown to user
               'model' => "App\Book", // foreign key model
               'allows_null' => false,
               'value' => request('book')
              
            ]);
        } else {
            $this->crud->addField([  // Select2
               'label' => "Book",
               'type' => 'select2',
               'name' => 'book_id', // the db column for the foreign key
               'entity' => 'book', // the method that defines the relationship in your Model
               'attribute' => 'title', // foreign key attribute that is shown to user
               'model' => "App\Book", // foreign key model
               'allows_null' => false
               
            ]);
        }

      $this->crud->addButtonFromModelFunction('line', 'questions', 'manageQuestions', 'end');

      
    }

        /**
     * Display all rows in the database for this entity.
     *
     * @return Response
     */
    public function getChapters(Book $book)
    {
        $this->crud->hasAccessOrFail('list');

        $this->crud->addClause('where', 'book_id', '=', $book->id);

        $this->crud->setListView('admin.bookchapters.list');

        $this->data['crud'] = $this->crud;
        $this->data['title'] = 'Chapters' . ' | ' . $book->title;

        // get all entries if AJAX is not enabled
        if (! $this->data['crud']->ajaxTable()) {
            $this->data['entries'] = $this->data['crud']->getEntries();
        }

        $this->data['book'] = $book;

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


        $this->crud->setRoute("admin/bookchapters/book:".request('book'));

        $this->crud->setCreateView('admin.bookchapters.create');


        // prepare the fields you need to show
        $this->data['crud'] = $this->crud;
        $this->data['saveAction'] = $this->getSaveAction();
        $this->data['fields'] = $this->crud->getCreateFields();
        $this->data['title'] = trans('backpack::crud.add').' '.$this->crud->entity_name;

        $this->data['book'] = Book::findOrFail(request('book'));

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

        

        $this->crud->setEditView('admin.bookchapters.edit');

        // get the info for that entry
        $this->data['entry'] = $this->crud->getEntry($id);
        $this->data['crud'] = $this->crud;
        $this->data['saveAction'] = $this->getSaveAction();
        $this->data['fields'] = $this->crud->getUpdateFields($id);
        $this->data['title'] = trans('backpack::crud.edit').' '.$this->crud->entity_name;

        $this->data['id'] = $id;

        $this->data['book'] = $this->data['entry']->book;

        $this->crud->setRoute("admin/bookchapters/book:".$this->data['entry']->book->id);

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
                $redirectUrl = 'admin/bookchapters/create?book=' . $this->crud->entry->book->id;
                break;
            case 'save_and_edit':
                $redirectUrl = 'admin/bookchapters'.'/'.$itemId.'/edit';
                if (\Request::has('locale')) {
                    $redirectUrl .= '?locale='.\Request::input('locale');
                }
                break;
            case 'save_and_back':
            default:
                $redirectUrl = 'admin/bookchapters/book:' . $this->crud->entry->book->id;
                break;
        }

        return \Redirect::to($redirectUrl);
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

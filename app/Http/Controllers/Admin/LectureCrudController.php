<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\LectureRequest as StoreRequest;
use App\Http\Requests\LectureRequest as UpdateRequest;

class LectureCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Lecture');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/lectures');
        $this->crud->setEntityNameStrings('Lecture', 'Lectures');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        // $this->crud->setFromDb();
         $this->crud->setColumns([
             [
            'name' => 'name',
            'label' => "Lecture Name"
            ],
            ['name' => 'created_at',
            'label' => "Lecture Date"]


    ]);
        $this->crud->addFields([
            [
            'name' => 'name',
            'label' => "Lecture Name"
            ],

            [
            'name' => 'short_description',
            'label' => "Lecture Short Description",
            'type' => 'textarea'
            ],

            [
            'name' => 'description',
            'label' => "Lecture Description",
            'type' => 'summernote'
            ],

            [
            'name' => 'fees',
            'label' => "Lecture Fees (Enter 0 for free )",
            'type' => 'number'
            ],

            ['name' => 'date',
            'label' => "Lecture Date",
            'type' => 'date'
            ],

             ['name' => 'start_time',
            'label' => "Lecture time",
            'type' => 'time'
            ],

            ['name' => 'duration',
            'label' => "Lecture Duration ( in hrs )",
            'type' => 'number'
            ],

             ['name' => 'link',
            'label' => "Link to Lecture",
            'type' => 'text'
            ],

            [ // select_from_array
    'name' => 'active',
    'label' => "Lecture Active State",
    'type' => 'select2_from_array',
    'options' => [ 0 => 'Scheduled', 1 => 'Lecture Active'],
    'allows_null' => false,
    // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
],
            
            


    ]);

      
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

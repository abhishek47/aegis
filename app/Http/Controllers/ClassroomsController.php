<?php

namespace App\Http\Controllers;

use App\Classroom;
use Illuminate\Http\Request;

class ClassroomsController extends Controller
{

	 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
    	$classrooms = Classroom::latest()->paginate(10);

    	return view('v2.courses.index', compact('classrooms'));
    }


    public function show(Classroom $classroom)
    {
    	return view('v2.courses.show', compact('classroom'));
    }
}

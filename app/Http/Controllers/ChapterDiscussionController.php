<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Chapter;
use Illuminate\Http\Request;

class ChapterDiscussionController extends Controller
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
    
     public function index(Classroom $classroom, Chapter $chapter)
    {
    	return view('chapters.discussion.index', compact('classroom', 'chapter'));
    }
}

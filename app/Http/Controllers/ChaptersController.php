<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Chapter;
use Illuminate\Http\Request;

class ChaptersController extends Controller
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

    
    public function show(Classroom $classroom, Chapter $chapter)
    {
    	return view('chapters.show', compact('classroom', 'chapter'));
    }

    public function start(Chapter $chapter)
    {
    	$chapter->status = 1;
    	$chapter->save();

    	return response([], 200);
    }

     public function close(Chapter $chapter)
    {
    	$chapter->status = 2;
    	$chapter->save();

    	return response([], 200);
    }


     public function toggleMembers(Chapter $chapter)
    {
        $status = $chapter->view_members;
        if($status)
            $chapter->view_members = 0;
        else
            $chapter->view_members = 1;

        $chapter->save();

        return response(['data'=>$chapter->view_members], 200);
    }
}

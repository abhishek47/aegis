<?php

namespace App\Http\Controllers;

use App\ChapterMessage;
use Illuminate\Http\Request;

class ChapterMessagesController extends Controller
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
    	return ChapterMessage::latest()->get();
    }
}

<?php

namespace App\Http\Controllers;

use App\Wiki;
use App\Quiz;
use Illuminate\Http\Request;

class WikiController extends Controller
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
    	$wikis = Wiki::all();
    	return view('wiki.index', compact('wikis'));
    }

    public function create()
    {
    	$quizzes = Quiz::orderBy('name', 'asc')->get();
    	return view('wiki.create', compact('quizzes'));
    }

    public function store(Request $request)
    {
    	$request->validate([
    		    'title' => 'required',
                'comment'  => 'required',
                'category_id' => 'required'
    		]);

    	$wiki = new Wiki;
    	$wiki->title = $request->get('title');
    	$wiki->body = $request->get('comment');
    	$wiki->category_id = $request->get('category_id');
    	$wiki->save();

    	return redirect('/wiki/' . $wiki->id);
    }


    public function show(Wiki $wiki)
    {
    	return view('wiki.show', compact('wiki'));
    }

    public function update(Request $request, Wiki $wiki)
    {
    	$request->validate([
                'comment'  => 'required',
    		]);

    	$wiki->body = $request->get('comment');

    	$wiki->save();

    	return redirect('/wiki/' . $wiki->id);
    }

}

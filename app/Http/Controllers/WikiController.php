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
    	$wikis = Wiki::latest()->where('published', 1)->paginate(10);
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

    	return redirect('/wiki/preview' . $wiki->id);
    }

    public function publish(Wiki $wiki)
    {
        $wiki->published = !$wiki->published;
        $wiki->save();

        return back();
    }    

    public function show(Wiki $wiki)
    {
    	$quizzes = Quiz::orderBy('name', 'asc')->get();
    	return view('wiki.show', compact('wiki', 'quizzes'));
    }

    public function preview(Wiki $wiki)
    {
        $quizzes = Quiz::orderBy('name', 'asc')->get();
        return view('wiki.preview', compact('wiki', 'quizzes'));
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



    public function getSection(Wiki $wiki, $section)
    {

        return response(['data'=> $wiki->body], 200);
    }

}

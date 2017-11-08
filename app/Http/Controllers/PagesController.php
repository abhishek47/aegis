<?php

namespace App\Http\Controllers;

use App\Wiki;
use App\Course;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
    	$wikiOfDay = Wiki::latest()->where('published', 1)->first();
        $wikis = Wiki::latest()->where('published', 1)->limit(3)->get();
        $courses = Course::latest()->get();

    	return view('welcome', compact('wikiOfDay', 'wikis', 'courses'));
    }

    public function about()
    {
    	return view('pages.about');
    }

    public function careers()
    {
    	return view('pages.careers');
    }

    public function contact()
    {
    	return view('pages.contact');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function policy()
    {
        return view('pages.policy');
    }



    
}

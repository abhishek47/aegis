<?php

namespace App\Http\Controllers;

use App\Wiki;
use App\Course;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
    	$wikiOfDay = Wiki::latest()->first();
        $wikis = Wiki::latest()->limit(3)->get();
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

    
}

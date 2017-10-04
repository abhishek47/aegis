<?php

namespace App\Http\Controllers;

use App\Wiki;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
    	$wikiOfDay = Wiki::latest()->first();
    	return view('welcome', compact('wikiOfDay'));
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

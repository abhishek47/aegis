<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
    	return view('welcome');
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

<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Http\Request;

class DiscussionsController extends Controller
{
    public function index()
    {
    	$discussions = Discussion::latest()->get();
    	return view('discuss.index', compact('discussions'));
    }

    public function show(Discussion $discussion)
    {
    	return view('discuss.index', compact('discussion'));
    }


    public function store()
    {
    	$id = auth()->user()->discussions()->create(request()->all());

    	return redirect('/discuss/discussion:' . $id);
    }
}

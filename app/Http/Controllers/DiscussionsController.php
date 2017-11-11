<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Http\Request;

class DiscussionsController extends Controller
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
    	$discussions = Discussion::latest()->paginate(10);
    	return view('discuss.index', compact('discussions'));
    }

    public function show(Discussion $discussion)
    {
    	return view('discuss.show', compact('discussion'));
    }


    public function store()
    {
    	$d = auth()->user()->discussions()->create(request()->all());

    	return redirect('/discuss/discussion:' . $d->id);
    }

    public function update(Discussion $discussion)
    {
        $discussion->update(request()->all());

        return redirect('/discuss/discussion:' . $discussion->id);
    }
}

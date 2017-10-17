<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Solution;
use Illuminate\Http\Request;

class SolutionsController extends Controller
{
     public function store(Discussion $discussion)
    {
    	$solution = new Solution;
    	$solution->body = request()->get('comment');
    	$solution->user_id = \Auth::user()->id;

    	$discussion->comments()->save($solution);

    	return back();
    }

    public function like(Solution $solution)
    {
    	$solution->likes = $solution->likes + 1;

    	$solution->save();

    	return back();
    }

    public function dislike(Solution $solution)
    {
    	$solution->dislikes = $solution->likes + 1;

    	$solution->save();
    	
    	return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Question;
use Illuminate\Http\Request;

class CommentsController extends Controller
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

    
    public function store(Question $question)
    {
    	$comment = new Comment;
    	$comment->body = request()->get('comment');
    	$comment->user_id = \Auth::user()->id;

    	$question->comments()->save($comment);

    	return back();
    }

    public function like(Comment $comment)
    {
    	$comment->likes = $comment->likes + 1;

    	$comment->save();

    	return back();
    }

    public function dislike(Comment $comment)
    {
    	$comment->dislikes = $comment->likes + 1;

    	$comment->save();
    	
    	return back();
    }
}

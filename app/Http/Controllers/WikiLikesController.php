<?php

namespace App\Http\Controllers;

use App\Wiki;
use App\WikiLike;
use Illuminate\Http\Request;

class WikiLikesController extends Controller
{
    public function store(Request $request, Wiki $wiki){
    	if($wiki->likes()->where('user_id', auth()->id())->exists())
    	{
    		$wiki->likes()->where('user_id', auth()->id())->first()->delete();

    		
	    		return response(['msg'=>'disliked', 'likes'=> count($wiki->likes)], 200);
	    	
    	} else {
    		$wiki->likes()->create(['user_id' => auth()->id()]);

    		
	    		return response(['msg'=>'liked', 'likes'=> count($wiki->likes)], 200);
	    	
    	}
    	

    	

    	


    }
}

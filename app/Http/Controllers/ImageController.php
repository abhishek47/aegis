<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
    	$src = $request->file('files')->store('uploads');

    	$path = asset($src);

    	return response(['src' => $path], 200);
    }
}

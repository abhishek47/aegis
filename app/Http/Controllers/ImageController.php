<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request) {
	    $file = $request->file('files');

	    $imageName = 'uploads/' . uniqid();

	    \Storage::disk('s3')->put($imageName, file_get_contents($file));
	    \Storage::disk('s3')->setVisibility($imageName, 'public');

	    $url = \Storage::disk('s3')->url($imageName);

	    return response(["src" => $url ], 200);
	}	
}

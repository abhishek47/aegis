<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/search',function(){
 $query = request()->get('query');
 $users = \App\User::where('name','like','%'.$query.'%')->get();
 return response()->json($users);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

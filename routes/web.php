<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/careers', 'PagesController@careers')->name('careers');
Route::get('/contact', 'PagesController@contact')->name('contact');

Route::get('/wiki', 'WikiController@index')->name('wiki');
Route::post('/wiki', 'WikiController@store')->name('wiki.store');
Route::get('/wiki/create', 'WikiController@create')->name('wiki.create');
Route::get('/wiki/{wiki}', 'WikiController@show')->name('wiki.show');
Route::post('/wiki/update/{wiki}', 'WikiController@update')->name('wiki.update');


Route::get('/quiz/{quiz}', 'QuizController@get')->name('quiz.get');

Route::get('/quiz/{quiz}/question:{question}/discuss', 'QuizController@discuss')->name('quiz.discuss');

Route::post('/comments/{question}', 'CommentsController@store');

Route::get('/comment/{comment}/like', 'CommentsController@like');
Route::get('/comment/{comment}/dislike', 'CommentsController@dislike');
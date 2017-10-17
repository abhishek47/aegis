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
Route::get('/terms-of-use', 'PagesController@terms');
Route::get('/privacy-policy', 'PagesController@policy');

Auth::routes();

$s = 'oauth.';
Route::get('/oauth/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\SocialController@getSocialRedirect']);
Route::get('/oauth/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\SocialController@getSocialHandle']);

Route::get('/home', function() {
	return redirect('/');
})->name('home');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/careers', 'PagesController@careers')->name('careers');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::get('/account', 'HomeController@account')->name('account');
Route::post('/account/update', 'HomeController@update')->name('account.update');
Route::post('/account/password/update', 'HomeController@updatePassword')->name('account.password.update');

Route::get('/wiki', 'WikiController@index')->name('wiki');
Route::post('/wiki', 'WikiController@store')->name('wiki.store');
Route::get('/wiki/create', 'WikiController@create')->name('wiki.create');
Route::get('/wiki/{wiki}', 'WikiController@show')->name('wiki.show');
Route::get('/wiki/preview/{wiki}', 'WikiController@preview')->name('wiki.show');
Route::get('/wiki/publish/{wiki}', 'WikiController@publish')->name('wiki.publish');
Route::post('/wiki/update/{wiki}', 'WikiController@update')->name('wiki.update');


Route::get('/quiz/{quiz}', 'QuizController@get')->name('quiz.get');

Route::get('/quiz/{quiz}/question:{question}/discuss', 'QuizController@discuss')->name('quiz.discuss');

Route::get('/discuss', 'DiscussionsController@index');
Route::post('/discuss', 'DiscussionsController@store');
Route::get('/discuss/discussion:{discussion}', 'DiscussionsController@show');

Route::post('/solutions/{discussion}', 'SolutionsController@store');
Route::get('/solutions/{solution}/like', 'SolutionsController@like');
Route::get('/solutions/{solution}/dislike', 'SolutionsController@dislike');

Route::post('/comments/{question}', 'CommentsController@store');

Route::get('/comment/{comment}/like', 'CommentsController@like');
Route::get('/comment/{comment}/dislike', 'CommentsController@dislike');

Route::post('/image/upload', 'ImageController@upload');


Route::get('/courses', 'CoursesController@index');
Route::get('/courses/{course}', 'CoursesController@show');
Route::get('/enroll/{course}', 'CoursesController@enroll');


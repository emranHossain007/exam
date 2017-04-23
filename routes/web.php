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

Route::get('/', function () {
    $postings = App\Posting::all();
    return view('welcome', compact('postings'));
});

Auth::routes();

Route::get('/send', 'HomeController@sendEmail');
Route::post('/search', 'HomeController@search');
Route::post('/posting/book', 'HomeController@book');
Route::get('/home', 'HomeController@index');
Route::post('/upload', 'HomeController@upload');
Route::get('/posting/create', 'PostingController@create');
Route::post('/posting', 'PostingController@store');
Route::get('/posting/{posting}', 'PostingController@show');
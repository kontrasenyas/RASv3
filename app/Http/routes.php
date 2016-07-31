<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/', 'SearchController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

// Route::get('profile', 'UserController@index');
// Route::post('profile', 'UserController@update');

Route::resource('profile', 'UserController');

Route::resource('product', 'ProductController');
Route::resource('booking', 'BookingController');
// Route::get('search/autocomplete', ['uses' => 'SearchController@autocomplete', 'as' => 'search.autocomplete']);
Route::get('search/autocomplete', 'SearchController@autocomplete');
Route::resource('search', 'SearchController');

Route::post('product/{id}/booking', 'BookingController@store');
Route::get('/messages', 'MessagesController@index');
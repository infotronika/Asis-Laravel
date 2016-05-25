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
Route::get('users', function()
{
    return View::make('users');
});

Route::auth();

Route::get('/home', 'HomeController@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Person routes...
Route::get('/persons', 'PersonController@index');
Route::post('/person', 'PersonController@store');
Route::delete('/person/{person}', 'PersonController@destroy');
Route::patch('/person/{person}', 'PersonController@show');
Route::get('/person/{person}', 'PersonController@edit');
Route::post('/person/{person}', 'PersonController@update');

// Contact routes...
Route::patch('/person/{person}/contacts', 'PersonContactController@show');
Route::post('/person/{person}/contact', 'PersonContactController@store');
Route::delete('/person/{person}/contact/{contact}', 'PersonContactController@destroy');
Route::get('/person/{person}/contact/{contact}', 'PersonContactController@edit');
Route::post('/person/{person}/contact/{contact}', 'PersonContactController@update');

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

Route::group(['middleware' => 'auth'], function() {

    //logout
    Route::get('/logout',['uses' => 'UserController@logout', 'as' => 'logout']);

    //view user's book only
    Route::get('/my-book',array('as' => 'my-book', 'uses' => 'UserController@showMyBook'));

    //book controller - crud
    Route::resource('book', 'BookController');

    //user controller
    Route::resource('user','UserController');

});

Route::group(['middleware' => 'guest'], function() {

    //main homepage
    Route::get('/', function () {return view('welcome');});

    //register
    Route::resource('user','UserController',['only' => ['create','store']]);

    //login
    Route::get('/login', array('as' => 'login' ,'uses' => 'UserController@showLoginPage') );

    //login
    Route::post('/login', 'UserController@login');

});


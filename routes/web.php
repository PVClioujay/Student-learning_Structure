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

// get
Route::get('/', function(){
    return view('Home.index');
});

Route::get('createUser', function(){
    return view('Register.index');
});

Route::get('addposter', function(){
    return view('Add.addPoster');
});

Route::get('logout', "loginController@logout");

// post
Route::post('posterManage', ['as' => 'login', 'uses' => 'loginController@login']);
Route::post('register', "RegistController@store");
Route::post('add', "PosterManagerController@store");

// Route::post('posterManage', "PosterManagerController@userPost")->middleware('auth');


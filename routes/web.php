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

Route::get('/', 'PageController@index');
Route::resource('/post', 'PostController');
Route::resource('/comment', 'CommentController');
Auth::routes();
Route::get('/category/{id}', 'CategoryController@index');
Route::get('/user/{id}', 'PageController@getUser');
Route::get('/user/{id}/change_profile_picture', 'PageController@changePic');

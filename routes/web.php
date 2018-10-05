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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::group(['middleware' => ['auth']], function() {
  Route::get('/upload', 'PostController@create')->name('upload');
  Route::get('/friends', 'AccountController@friends')->name('friends');
  Route::get('/myvideos', 'AccountController@myvideos')->name('myvideos');
  Route::get('/account', 'AccountController@show');
  Route::get('/notifications', 'AccountController@notifications');
  Route::get('/viewnotification/{id}', 'AccountController@viewNotification');
  Route::resource('posts', 'PostController', ['only' => ['create', 'store']]);
});

Route::resource('posts', 'PostController', ['except' => ['edit', 'update', 'create', 'store']]);
Route::resource('comments', 'CommentController', ['except' => ['edit', 'update', 'create', 'store']]);

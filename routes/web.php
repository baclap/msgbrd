<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('dashboard');

    Route::get('/thread/new', 'ThreadController@showForm')->name('thread_form');
    Route::post('/thread', 'ThreadController@create')->name('create_thread');
    Route::post('/thread/{id}/comment', 'CommentController@create')->name('create_comment');
});

Route::get('/thread/{id}', 'ThreadController@showThread')->name('thread_detail');
Route::get('/user/{id}', 'UserController@showProfile')->name('user_profile');

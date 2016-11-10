<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('dashboard');

    Route::get('/thread/new', 'ThreadController@showForm')->name('thread_form');
    Route::post('/thread', 'ThreadController@create')->name('create_thread');
});

Route::get('/thread/{id}', 'ThreadController@showThread')->name('thread_detail');

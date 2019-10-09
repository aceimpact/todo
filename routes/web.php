<?php

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'TaskController@index')->name('home');

    Route::resource('/tasks', 'TaskController');
});

Auth::routes();

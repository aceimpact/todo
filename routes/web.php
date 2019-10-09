<?php

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('/tasks', 'TaskController');
});

Auth::routes();

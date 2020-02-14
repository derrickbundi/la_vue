<?php

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('auth')->group(function() {
    Route::get('init', 'AuthController@init');
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

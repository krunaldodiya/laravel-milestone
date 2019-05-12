<?php

Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::get('/about', 'HomeController@about')->name('about');
Route::get('/feedback', 'HomeController@feedbackForm')->name('feedback');
Route::post('/feedback', 'HomeController@sendFeedback')->name('feedback');

Route::get("/reset-device", "HomeController@resetDevice")->name("reset.device");

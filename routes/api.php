<?php

Route::group(['prefix' => 'device', 'middleware' => 'guest:api'], function () {
    Route::post('/authenticate', 'UserController@authenticate');
});

Route::group(['prefix' => 'users', 'middleware' => 'auth:api'], function () {
    Route::post('/me', 'UserController@me');
    Route::post('/update', 'UserController@update');
});

Route::group(['prefix' => 'home', 'middleware' => 'auth:api'], function () {
    Route::post('/schools', 'HomeController@getSchools');
});

Route::group(['prefix' => 'categories', 'middleware' => 'auth:api'], function () {
    Route::post('/all', 'CategoryController@getCategories');
});

Route::group(['prefix' => 'videos', 'middleware' => 'auth:api'], function () {
    Route::post('/by-topic-id', 'VideoController@getVideos');
});

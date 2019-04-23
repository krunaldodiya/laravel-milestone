<?php

Route::group(['prefix' => 'device', 'middleware' => 'guest:api'], function () {
    Route::post('/authenticate', 'UserController@authenticate');
});

Route::group(['prefix' => 'users', 'middleware' => 'auth:api'], function () {
    Route::post('/me', 'UserController@me');
});

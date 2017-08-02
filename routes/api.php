<?php

use Illuminate\Http\Request;

Route::group(['namespace' => 'API'], function () {
    Route::post('me', 'AuthController@login');
    Route::delete('me', 'AuthController@logout');

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('/', function () {

        });

        // User
        Route::resource('user', 'UserController', ['only' => ['store', 'update', 'destroy']]);

    });

});

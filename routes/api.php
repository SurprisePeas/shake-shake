<?php

use Illuminate\Http\Request;

Route::group(['namespace' => 'API'], function () {
	Route::post('me', 'AuthController@login');
	Route::delete('me', 'AuthController@logout');
});

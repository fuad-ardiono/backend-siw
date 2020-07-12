<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

Route::group(['prefix' => 'auth'], function() {
	Route::post('signin', 'Api\AuthController@signin');

	Route::group(['middleware' => 'jwt_guard'], function () {
		Route::get('profile', 'Api\AuthController@getProfile');
		Route::post('signout', 'Api\AuthController@signout');
	});
});

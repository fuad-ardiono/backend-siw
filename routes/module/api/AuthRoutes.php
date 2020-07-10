<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function() {
	Route::post('signin', 'Api\AuthController@signin');

	Route::group(['middleware' => 'auth_user'], function () {
		Route::get('profile', 'Api\AuthController@getProfile');
		Route::post('signout', 'Api\AuthController@signout');
	});
});

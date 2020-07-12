<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'announcement', 'middleware' => 'jwt_guard'], function () {
	Route::group(['middleware' => 'acl:admin'], function () {
		Route::post('store', 'Api\AnnouncementController@store');
		Route::put('mark-not-active/{id}', 'Api\AnnouncementController@markNotActive');
	});

	Route::get('/', 'Api\AnnouncementController@index');
});

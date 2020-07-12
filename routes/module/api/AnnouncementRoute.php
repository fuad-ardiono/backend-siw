<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'announcement',], function () {
	Route::group(['middleware' => ['acl:admin', 'jwt_guard']], function () {
		Route::post('store', 'Api\AnnouncementController@store');
		Route::put('mark-not-active/{id}', 'Api\AnnouncementController@markNotActive');
	});

	Route::get('/', 'Api\AnnouncementController@index');
});

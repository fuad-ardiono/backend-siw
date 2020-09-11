<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'complaint', 'middleware' => 'jwt_guard'], function () {
	Route::group(['middleware' => 'acl:resident'], function () {
		Route::post('store', 'Api\ComplaintController@store');
	});

	Route::group(['middleware' => 'acl:admin'], function() {
		Route::get('/', 'Api\ComplaintController@index');
		Route::put('mark-is-read/{id}', 'Api\ComplaintController@markIsRead');
		Route::put('mark-is-pending/{id}', 'Api\ComplaintController@markIsPending');
		Route::put('mark-is-acc/{id}', 'Api\ComplaintController@markIsAcc');
	});
});

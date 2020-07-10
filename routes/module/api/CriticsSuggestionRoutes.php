<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'acl:resident'], function () {
	Route::group(['prefix' => 'critics-suggestion'], function () {
		Route::post('store', 'Api\CirticsSuggestionController@store');
	});
});

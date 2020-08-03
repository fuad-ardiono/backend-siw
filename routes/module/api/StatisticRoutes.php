<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'statistic', 'middleware' => 'jwt_guard'], function () {
	Route::get('/', 'Api\StatisticController@index');
});

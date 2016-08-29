<?php

Route::group(['middleware' => 'web', 'prefix' => 'mobileapi', 'namespace' => 'Modules\MobileApi\Http\Controllers'], function()
{
	Route::get('/', 'MobileApiController@index');
});
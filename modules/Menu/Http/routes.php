<?php

Route::group(['middleware' => ['web', 'admin'], 'prefix' => 'menu', 'namespace' => 'Modules\Menu\Http\Controllers'], function()
{
	Route::get('/', 'MenuController@index');
});
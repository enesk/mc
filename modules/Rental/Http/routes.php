<?php
Route::group(['middleware' => ['web', 'admin'], 'prefix' => 'admin/rental', 'namespace' => 'Modules\Rental\Http\Controllers'], function()
{
	CRUD::resource('stations', 'Admin\StationsController');
	CRUD::resource('categories', 'Admin\CategoriesController');
	CRUD::resource('classes', 'Admin\ClassesController');
	CRUD::resource('specifics', 'Admin\SpecificsController');
});
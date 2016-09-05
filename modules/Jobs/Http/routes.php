<?php
Route::group(['middleware' => ['web', 'admin'], 'prefix' => 'admin', 'namespace' => 'Modules\Jobs\Http\Controllers'], function()
{
	CRUD::resource('jobs/categories', 'Admin\CategoriesController');
	CRUD::resource('jobs', 'Admin\JobsController');
});


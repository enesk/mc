<?php
Route::group(['middleware' => ['web', 'admin'], 'prefix' => 'admin', 'namespace' => 'Modules\Jobs\Http\Controllers'], function()
{
	CRUD::resource('jobs/categories', 'Admin\CategoriesController');
	CRUD::resource('jobs', 'Admin\JobsController');
});
Route::group(['middleware' => ['web'], 'prefix' => 'karriere', 'namespace' => 'Modules\Jobs\Http\Controllers'], function()
{
	Route::get('anzeige/{id?}', ['as' => 'jobs.show', 'uses' => 'JobsController@view'])->where('id', '([A-Za-z0-9\-\/]+)');
});


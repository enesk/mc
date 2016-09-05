<?php
Route::group(['middleware' => ['web', 'admin'], 'prefix' => 'admin', 'namespace' => 'Modules\Team\Http\Controllers'], function()
{
	CRUD::resource('teams', 'Admin\TeamsController');
	CRUD::resource('members', 'Admin\MembersController');
});
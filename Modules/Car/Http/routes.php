<?php

Route::group(['middleware' => 'web', 'prefix' => 'admin', 'namespace' => 'Modules\Car\Http\Controllers'], function()
{
	Route::resource('cars', 'CarsController');
	Route::resource('companies', 'CompaniesController');
	Route::resource('models', 'CarModelsController');
	Route::resource('properties', 'PropertiesController');
});


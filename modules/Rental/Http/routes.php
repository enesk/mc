<?php
Route::group(['middleware' => ['web', 'admin'], 'prefix' => 'admin/rental', 'namespace' => 'Modules\Rental\Http\Controllers'], function () {
    CRUD::resource('stations', 'Admin\StationsController');
    CRUD::resource('categories', 'Admin\CategoriesController');
    CRUD::resource('classes', 'Admin\ClassesController');
    CRUD::resource('specifics', 'Admin\SpecificsController');
});


Route::group(['middleware' => ['web']], function () {
    Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
        Route::group(['as' => 'rental::', 'prefix' => 'rental', 'namespace' => 'Modules\Rental\Http\Controllers'], function () {
            #Route::get('search', ['as' => 'search', 'uses' => 'CarsController@search']);
            #Route::get('show/{carID}', ['as' => 'show', 'uses' => 'CarsController@show']);
        });
    });
});

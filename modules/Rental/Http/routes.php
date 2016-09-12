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
            Route::get('search', ['as' => 'search', 'uses' => 'RentalsController@search']);
            Route::get('class/{id}/extras', ['as' => 'extras', 'uses' => 'RentalsController@extras']);
            Route::post('check', ['as' => 'check', 'uses' => 'RentalsController@check']);
            Route::post('thanks', ['as' => 'thanks', 'uses' => 'RentalsController@thanks']);
        });
    });
});

<?php
Route::group(['middleware' => ['web']], function () {

    Route::get('imager/{image?}', function ($src) {
        $cacheimage = Image::cache(function ($image) use ($src) {
            return $image->make(public_path($src))->resize(320, 213);
        }, 1, false);
        return Response::make($cacheimage, 200, array('Content-Type' => 'image/jpeg'));
    })->where('image', '[A-Za-z0-9\/\.\-\_]+');

    Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
        Route::group(['as' => 'cars::', 'prefix' => 'sales', 'namespace' => 'Modules\Car\Http\Controllers'], function () {
            Route::get('search', ['as' => 'search', 'uses' => 'CarsController@search']);
            Route::get('show/{carID}', ['as' => 'show', 'uses' => 'CarsController@show']);
        });
    });
});

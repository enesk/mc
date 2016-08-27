<?php


Route::group(['prefix' => 'api', 'as' => 'api::', 'namespace' => 'Modules\Site\Http\Controllers'], function () {
    Route::post('models', ['as' => 'models', 'uses' => 'ApiController@getModels']);
});


Route::group(['middleware' => 'web', 'namespace' => 'Modules\Site\Http\Controllers'], function () {
    Route::get('{slug}', ['uses' => 'Modules\Site\Http\Controllers\PagesController@getPage'])->where('slug', '([A-Za-z0-9\-\/]+)');
});

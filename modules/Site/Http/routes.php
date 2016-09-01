<?php
Route::group(['prefix' => 'api', 'as' => 'api::', 'namespace' => 'Modules\Site\Http\Controllers'], function () {
    Route::post('models', ['as' => 'models', 'uses' => 'ApiController@getModels']);
});

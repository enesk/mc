<?php

Route::group(['prefix' => 'send-mail', 'as' => 'email::'], function () {
    Route::group(['namespace' => 'Modules\Car\Http\Controllers'], function () {
        Route::post('interested', ['as' => 'interested', 'uses' => 'EmailsController@interested']);
    });
    Route::group(['namespace' => 'Modules\Site\Http\Controllers'], function () {
        Route::post('contact', ['as' => 'contact', 'uses' => 'EmailsController@contact']);
    });
});
<?php
Route::group(['middleware' => ['web', 'admin'], 'prefix' => 'admin', 'namespace' => 'Modules\Slider\Http\Controllers'], function () {
    CRUD::resource('sliders', 'Admin\SlidersController');
    CRUD::resource('slides', 'Admin\SlidesController');
});
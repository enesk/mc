<?php
Route::group(['middleware' => ['web', 'admin'], 'prefix' => 'admin', 'namespace' => 'Modules\Testimonial\Http\Controllers'], function()
{
	CRUD::resource('testimonials', 'Admin\TestimonialsController');
});
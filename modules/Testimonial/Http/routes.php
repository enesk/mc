<?php
Route::group(['middleware' => 'web', 'prefix' => 'admin', 'namespace' => 'Modules\Testimonial\Http\Controllers'], function()
{
	CRUD::resource('testimonials', 'Admin\TestimonialsController');
});
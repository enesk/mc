<?php namespace Modules\Site\Providers;

use Illuminate\Support\ServiceProvider;

class ShortcodesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        \Shortcode::register('team', 'Modules\Site\Shortcodes\TeamShortcode@profiles');
    }
}
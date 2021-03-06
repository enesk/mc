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
        \Shortcode::register('jobs', 'Modules\Site\Shortcodes\JobsShortcode@jobs');
        \Shortcode::register('contact', 'Modules\Site\Shortcodes\ContactShortcode@contact');
    }
}
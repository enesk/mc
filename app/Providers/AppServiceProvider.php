<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // register the services that are only used for development
        if ($this->app->environment() == 'local') {
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
            $this->app->register('Backpack\Generators\GeneratorsServiceProvider');
        }

        \Blade::extend(function($value, $compiler){
            $value = preg_replace('/(\s*)@switch\((.*)\)(?=\s)/', '$1<?php switch($2):', $value);
            $value = preg_replace('/(\s*)@endswitch(?=\s)/', '$1endswitch; ?>', $value);
            $value = preg_replace('/(\s*)@case\((.*)\)(?=\s)/', '$1case $2: ?>', $value);
            $value = preg_replace('/(?<=\s)@default(?=\s)/', 'default: ?>', $value);
            $value = preg_replace('/(?<=\s)@breakswitch(?=\s)/', '<?php break;', $value);
            return $value;
        });
    }
}

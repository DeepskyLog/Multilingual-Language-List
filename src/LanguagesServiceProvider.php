<?php

namespace DeepskyLog\Languages;

use Illuminate\Support\ServiceProvider;

class LanguagesServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     */
    public function register()
    {
        $this->app->singleton('languages', function () {
            return new \DeepskyLog\Languages\Maker;
        });
    }

    /**
     * Perform post-registration booting of services.
     *
     */
    public function boot()
    {
        //
    }
}

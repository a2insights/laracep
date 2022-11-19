<?php

namespace A2insights\Laracep;

use Illuminate\Support\ServiceProvider;

class LaraCepServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laracep.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laracep');

        // Register the main class to use with the facade
        $this->app->singleton('cep', function () {
            return new Cep;
        });
    }
}

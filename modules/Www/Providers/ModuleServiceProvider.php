<?php

namespace Modules\Www\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'www');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'www');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'www');
        $this->loadConfigsFrom(__DIR__.'/../config');
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}

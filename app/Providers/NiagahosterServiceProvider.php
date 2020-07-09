<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class NiagahosterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Services\Package\Contract', 'App\Services\Package\Service');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

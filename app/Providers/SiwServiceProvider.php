<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SiwServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    	$this->app->singleton('App\Services\Auth\Contract', 'App\Services\Auth\Service');
		$this->app->singleton(
			'App\Services\CriticsSuggestion\Contract',
			'App\Services\CriticsSuggestion\Service'
		);

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

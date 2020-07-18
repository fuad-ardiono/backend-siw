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
		$this->app->singleton('App\Services\Complaint\Contract', 'App\Services\Complaint\Service');
		$this->app->singleton('App\Services\Announcement\Contract', 'App\Services\Announcement\Service');
		$this->app->singleton('App\Services\HeadFamily\Contract', 'App\Services\HeadFamily\Service');
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

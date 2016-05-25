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
        //
    }
	/**
	 * The policy mappings for the application.
	 *
	 * @var array
	 */
	protected $policies = [
		'App\Person' => 'App\Policies\PersonPolicy',
	];
}

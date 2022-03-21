<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\AuthService\AuthInterface;
use App\Services\AuthService\AuthService;
use App\Services\MovieService\MovieInterface;
use App\Services\MovieService\MovieService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            AuthInterface::class,
            AuthService::class,          
        );

        $this->app->bind(
            MovieInterface::class,
            MovieService::class,          
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

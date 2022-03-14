<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\AuthService\AuthInterface;
use App\Services\AuthService\AuthService;

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
            AuthService::class
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

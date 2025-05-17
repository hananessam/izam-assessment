<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Repositories\Contracts\ProductInterface::class, \App\Repositories\ProductRepository::class);
        $this->app->bind(\App\Repositories\Contracts\AuthInterface::class, \App\Repositories\AuthRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

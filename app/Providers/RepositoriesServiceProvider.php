<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\{ContactRepository, OrderRepository};
use App\Interfaces\{ContactRepositoryInterface, OrderRepositoryInterface};

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
    }
}

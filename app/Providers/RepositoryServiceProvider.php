<?php

namespace App\Providers;

use App\Interfaces\BookingRepositoryInterface;
use App\Interfaces\ClientRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Services\BookingService;
use App\Services\ClientService;
use App\Services\ProductService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(ClientRepositoryInterface::class, ClientService::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductService::class);
        $this->app->bind(BookingRepositoryInterface::class, BookingService::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}

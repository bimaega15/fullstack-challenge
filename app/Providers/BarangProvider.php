<?php

namespace App\Providers;

use App\Interfaces\BarangInterface;
use App\Services\BarangService;
use Illuminate\Support\ServiceProvider;

class BarangProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(BarangInterface::class, BarangService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

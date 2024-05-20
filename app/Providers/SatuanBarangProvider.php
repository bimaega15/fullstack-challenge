<?php

namespace App\Providers;

use App\Interfaces\SatuanBarangInterface;
use App\Services\SatuanBarangService;
use Illuminate\Support\ServiceProvider;

class SatuanBarangProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(SatuanBarangInterface::class, SatuanBarangService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

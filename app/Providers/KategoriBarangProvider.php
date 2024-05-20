<?php

namespace App\Providers;

use App\Interfaces\KategoriBarangInterface;
use App\Services\KategoriBarangService;
use Illuminate\Support\ServiceProvider;

class KategoriBarangProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(KategoriBarangInterface::class, KategoriBarangService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

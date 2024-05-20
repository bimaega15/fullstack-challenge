<?php

namespace App\Providers;

use App\Interfaces\Select2Interface;
use App\Services\Select2Service;
use Illuminate\Support\ServiceProvider;

class Select2Provider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(Select2Interface::class, Select2Service::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

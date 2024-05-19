<?php

namespace App\Providers;

use App\Interfaces\CompleteProfileInterface;
use App\Services\CompleteProfileService;
use Illuminate\Support\ServiceProvider;

class CompleteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(CompleteProfileInterface::class, CompleteProfileService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

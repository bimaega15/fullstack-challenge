<?php

namespace App\Providers;

use App\Interfaces\AccountServiceInterface;
use App\Services\AccountService;
use Illuminate\Support\ServiceProvider;

class AccountServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(AccountServiceInterface::class, AccountService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Providers;

use App\Interfaces\Api\MessageAppInterface;
use App\Services\Api\MessageAppService;
use Illuminate\Support\ServiceProvider;

class MessageAppProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(MessageAppInterface::class, MessageAppService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

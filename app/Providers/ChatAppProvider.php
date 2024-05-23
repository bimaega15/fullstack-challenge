<?php

namespace App\Providers;

use App\Interfaces\Api\ChatAppInterface;
use App\Services\Api\ChatAppService;
use Illuminate\Support\ServiceProvider;

class ChatAppProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(ChatAppInterface::class, ChatAppService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

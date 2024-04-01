<?php

namespace App\Providers;

use App\Services\ContactService;
use App\Services\ContactServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    public $bindings = [
        ContactServiceInterface::class => ContactService::class,
    ];
}

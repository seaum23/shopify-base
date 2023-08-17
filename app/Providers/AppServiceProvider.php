<?php

namespace App\Providers;

use Shopify\Context;
use Shopify\Auth\FileSessionStorage;
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
        Context::initialize(
            apiKey: config('shopify.api_key'),
            apiSecretKey: config('shopify.api_secret'),
            scopes: config('shopify.api_scopes'),
            hostName: config('app.url'),
            sessionStorage: new FileSessionStorage('/tmp/php_sessions'),
            apiVersion: config('shopify.api_version'),
            isEmbeddedApp: false,
            isPrivateApp: false,
        );
    }
}

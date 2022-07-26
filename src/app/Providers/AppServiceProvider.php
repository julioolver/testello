<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    const AUTH = 'Auth';
    const OAUTH = 'OAuth';
    const SHIPPING_RATE = 'ShippingRate';

    const ENTITIES = [
        self::SHIPPING_RATE,
        self::AUTH,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach (self::ENTITIES as $key => $entity) {
            $this->app->bind("App\Services\Contracts\\{$entity}ServiceContract", "App\Services\\{$entity}Service");
        }

        $this->app->bind("App\Services\Contracts\\". self::OAUTH ."ServiceContract", "App\Services\\". self::OAUTH ."\MailAuthService");
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

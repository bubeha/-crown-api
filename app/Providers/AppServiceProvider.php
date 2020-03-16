<?php

namespace App\Providers;

use App\Services\AuthorizeService;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AuthorizeService::class, static function (Application $app) {
            $guard = $app->get('guard');

            return new AuthorizeService($guard);
        });
    }
}

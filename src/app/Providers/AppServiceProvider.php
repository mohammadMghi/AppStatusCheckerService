<?php

namespace App\Providers;

use App\Facades\AppStoreFacade;
use App\Facades\GooglePlayApiFacade;
use App\Facades\GooglePlayFacade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind('googlePlay-api', function ($app) {
            return new GooglePlayFacade();
        });

        $this->app->bind('appStore-api', function ($app) {
            return new AppStoreFacade();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Providers;

use App\Domain\AppStoreStatus;
use App\Domain\GooglePlayeStatus;
use App\Facades\AppStoreApiFacade;
use App\Facades\AppStoreFacade;
 
use App\Facades\GooglePlayFacade;
use App\Facades\Handlers\AppStoreApiHandler;
use App\Facades\Handlers\GooglePlayApiHandler;
use App\Listener\ChangeStateNotification;
use App\Log\LogStateHandler;
use App\Notification\Email\EmailHandler;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
    
        $this->app->bind(AppStoreApiHandler::class, function ($app) {
            $appStoreStatus = $app->make(AppStoreStatus::class);
            return new AppStoreApiHandler($appStoreStatus);
        });

        $this->app->bind(GooglePlayApiHandler::class, function ($app) {
            $googlePlayeStatus = $app->make(GooglePlayeStatus::class);
            return new GooglePlayApiHandler($googlePlayeStatus);
        });


        $this->app->bind(ChangeStateNotification::class, function ($app) {
            $emailHandler = $app->make(EmailHandler::class);
            $logStateHandler = $app->make(LogStateHandler::class);
            return new ChangeStateNotification($emailHandler , $logStateHandler);
        });

        
        $this->app->bind('googlePlay-api', function ($app) {
         
            return new GooglePlayFacade();
        });

        $this->app->bind('appStore-api', function ($app) {
            return new AppStoreApiFacade();
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

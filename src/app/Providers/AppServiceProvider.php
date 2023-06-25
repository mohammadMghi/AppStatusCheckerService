<?php

namespace App\Providers;

use App\Domain\AppStoreStatus;
use App\Domain\GooglePlayeStatus;
use App\Domain\StatusContract;
use App\Facades\AppStoreApiFacade;
use App\Facades\AppStoreFacade;
 
use App\Facades\GooglePlayFacade;
use App\Facades\Handlers\AppStoreApiHandler;
use App\Facades\Handlers\GooglePlayApiHandler;
use App\Listener\ChangeStateNotification;
use App\Log\LogContract;
use App\Log\LogStateHandler;
use App\Notification\Email\EmailContract;
use App\Notification\Email\EmailHandler;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
    
      
 


        $this->app->bind(ChangeStateNotification::class, function ($app) {
            $emailHandler = $app->bind(EmailContract::class , EmailHandler::class);
            $logStateHandler = $app->binnd(LogContract::class, LogStateHandler::class);
            return new ChangeStateNotification($emailHandler , $logStateHandler);
        });

        
        $this->app->bind('googlePlay-api', function ($app) {
         
            return new GooglePlayApiHandler(new GooglePlayeStatus(new Schedule()));
        });

        $this->app->bind('appStore-api', function ($app) {
 
            return new AppStoreApiHandler(new AppStoreStatus(new Schedule()));
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

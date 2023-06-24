<?php

namespace App\Facades\Handlers;

use App\Domain\AppStoreStatus;
use App\Models\App;
use App\Jobs\CheckAppStoreEveryTwoHoures;
use App\Jobs\CheckHourlyJob;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
class AppStoreApiHandler  
{

    var AppStoreStatus $appStoreStatus;
    public function __construct(AppStoreStatus $appStoreStatus){
        $this->appStoreStatus = $appStoreStatus;
    }
    public function handle(App $app): void
    {
        
        //sends request to app store for get status
        $response = Http::get('http://appStore.com', [
            'id' => $app->getID(),
            'name' => $app->getName(),
        ]);

        $this->appStoreStatus->chacker($response , $app);
        //checks two hours later


        return ;
    }
}
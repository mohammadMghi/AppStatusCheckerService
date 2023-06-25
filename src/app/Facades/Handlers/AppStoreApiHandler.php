<?php

namespace App\Facades\Handlers;

use App\Domain\AppStoreStatus;
use App\Domain\StatusContract;
use App\Models\App;
use App\Jobs\CheckAppStoreEveryTwoHoures;
use App\Jobs\CheckHourlyJob;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
class AppStoreApiHandler  
{

    var AppStoreStatus $appStoreStatus;
    public function __construct(StatusContract $appStoreStatus){
        $this->appStoreStatus = $appStoreStatus;
    }
    public function handle(App $app) 
    {
     
        //sends request to app store for get status
        $response = Http::get('http://appStore.com', [
            'id' =>  $app['device_id'],
            'name' =>  $app['name'],
        ]);

        $this->appStoreStatus->chacker($response , $app);
  


        return $response->json();
    }
}
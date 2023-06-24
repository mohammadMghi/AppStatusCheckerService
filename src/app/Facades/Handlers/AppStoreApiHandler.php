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
    
        $response = Http::get('http://appStore.com', [
            'id' => $app->getID(),
            'name' => $app->getName(),
        ]);


        if($response->status() == 200){

            $json = $response->json();

            $stausJsonResponse = json_decode($json);

            foreach( $stausJsonResponse as $key => $value) {

 
                $preStatus = Redis::get('subscription_status');
                
                if($preStatus ){

                }

                if($key["subscription"] == "expired"){
                    
             
                }

                return;
             }

             dispatch(new CheckAppStoreEveryTwoHoures($app));

             return;
            
        } 
        //checks two hours later


        return ;
    }
}
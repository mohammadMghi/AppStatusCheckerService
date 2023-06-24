<?php

namespace App\Facades\Handlers;

use App\Entities\App;
use App\Jobs\CheckAppStoreEveryTwoHoures;
use App\Jobs\CheckHourlyJob;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
class AppStoreApiHandler  
{
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


                //if status change from active to expired must be reported to admin (Event base)
                //persist last status on redis for checks with new got status
                //get last status from redis
                $PreStatus = Redis::get('subscription_status');
                
                if($PreStatus ){

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
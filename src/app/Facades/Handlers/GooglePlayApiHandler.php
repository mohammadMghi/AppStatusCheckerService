<?php

namespace App\Facades\Handlers;

use App\Entities\App;
use App\Jobs\CheckGooglePlayHourlyJob;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;

class GooglePlayApiHandler
{
    public function handle(App $app): void
    {
    
        $response = Http::get('http://googlePlay.com', [
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

                

                if($key["subscription"] == "expired"){
                    $value = Redis::get('subscription_status');
                
                
             
                }

                return;
             }

             dispatch(new CheckGooglePlayHourlyJob($app));

             return;
            
        } 
        //checks two hours later


        return ;
    }
}
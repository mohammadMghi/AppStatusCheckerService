<?php
namespace App\Domain;

use App\Jobs\CheckGooglePlayHourlyJob;
use Illuminate\Support\Facades\Redis;

class GooglePlayeStatus{

    public function chacker($response , $app){
        $PreStatus = Redis::get('subscription_status');
        if($response->status() == 200){

            $json = $response->json();

            $stausJsonResponse = json_decode($json);

            foreach( $stausJsonResponse as $key => $value) {
 
                if($key["subscription"] == "expired"){
                    if($PreStatus == "active" ){
                        
                    }
             
                }
             }

            dispatch(new CheckGooglePlayHourlyJob($app));
 
            
        } 
    }


}


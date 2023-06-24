<?php
namespace App\Domain;

use App\Jobs\CheckGooglePlayHourlyJob;
use ChangeState;
use Illuminate\Support\Facades\Redis;


//This class responsible for checking status code and decide base on it
class GooglePlayeStatus{

    public function chacker($response , $app){

        $json = $response->json();

        $stausJsonResponse = json_decode($json);

        $preStatus = Redis::get('subscription_status');
 
        if($response->status() == 200){

     
            foreach( $stausJsonResponse as $key => $value) {
                
                //dispatch event for persist log and send email
                ChangeState::dispatch($key["subscription"]);
                
                if($key["subscription"] == "expired"){
                 
               
             
                }
             }

            dispatch(new CheckGooglePlayHourlyJob($app));
 
            
        } 
    }


}


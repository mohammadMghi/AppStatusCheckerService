<?php
namespace App\Domain;

use App\Jobs\CheckGooglePlayHourlyJob;
use ChangeState;
use Illuminate\Support\Facades\Redis;


//This class responsible for checking status code and decide base on it
class GooglePlayeStatus implements StatusContract
{

    public function chacker($response , $app)
    {

        $json = $response->json();

        $stausJsonResponse = json_decode($json);


 
        if($response->getStatusCode() == 200){

            ChangeState::dispatch($stausJsonResponse["status"]);

            return;
            
        } 

        dispatch(new CheckGooglePlayHourlyJob($app));
    }


}


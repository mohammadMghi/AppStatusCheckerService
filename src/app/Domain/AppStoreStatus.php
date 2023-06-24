<?php
namespace App\Domain;

use App\Jobs\CheckAppStoreEveryTwoHoures;
use ChangeState;
use Illuminate\Support\Facades\Redis;

class AppStoreStatus
{

    public function chacker($response , $app)
    {

        $json = $response->json();

        $stausJsonResponse = json_decode($json);

 
        if($response->status() == 200)
        {
 
            ChangeState::dispatch($stausJsonResponse["subscription"]);
  
 
            return;
            
        } 


        dispatch(new CheckAppStoreEveryTwoHoures($app));
    }
}
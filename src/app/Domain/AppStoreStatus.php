<?php
namespace App\Domain;

use App\Jobs\CheckAppStoreEveryTwoHoures;
use ChangeState;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Redis;

class AppStoreStatus implements StatusContract
{
    var Schedule $schedule;
    public function __construct(Schedule $schedule)
    {
        $this->schedule = $schedule;
    }
    public function chacker($response , $app)
    {

        $json = $response->json();

        $stausJsonResponse = json_decode($json);

 
        if($response->getStatusCode() == SUCCESS_STATUS_CODE)
        {
 
            ChangeState::dispatch($stausJsonResponse["subscription"]);
  
 
            return;
            
        } 

        $this->schedule->job(new CheckAppStoreEveryTwoHoures($app))->everyTwoHours();
 
    }
}
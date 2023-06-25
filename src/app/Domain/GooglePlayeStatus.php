<?php
namespace App\Domain;

use App\Helper\CustomScheduler;
use App\Jobs\CheckGooglePlayHourlyJob;
use App\Jobs\WeeklyJobAppstore;
use ChangeState;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Redis;

const SUCCESS_STATUS_CODE = 200;
//This class responsible for checking status code and decide base on it
class GooglePlayeStatus implements StatusContract
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


 
        if($response->getStatusCode() == SUCCESS_STATUS_CODE){

            ChangeState::dispatch($stausJsonResponse["status"]);

            return;

        } 
 
 
        $this->schedule->job(new CheckGooglePlayHourlyJob($app))->hourly();
       
    }


}


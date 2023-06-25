<?php
namespace App\Domain;

use App\Jobs\CheckAppStoreEveryTwoHoures;
 
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Redis;
use App\Events\ChangeState;
const SUCCESS_STATUS_CODE = 200;
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

        dump("code ::" .$response->getStatusCode() );
 
        if($response->getStatusCode() == SUCCESS_STATUS_CODE)
        {
 
            if ($stausJsonResponse != null) ChangeState::dispatch($stausJsonResponse["subscription"]);
  
 
            return;
            
        } 

        $this->schedule->job(new CheckAppStoreEveryTwoHoures($app))->everyTwoHours();
 
    }
}
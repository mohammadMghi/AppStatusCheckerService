<?php

namespace App\Facades\Handlers;

use App\Domain\GooglePlayeStatus;
use App\Domain\GooglePlayeStatusChacker;
use App\Entities\App;
use App\Jobs\CheckGooglePlayHourlyJob;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;

class GooglePlayApiHandler
{
    var GooglePlayeStatus $googlePlayeStatusChacker;
    public function __construct(GooglePlayeStatus $googlePlayeStatusChacker){
        $this->googlePlayeStatusChacker = $googlePlayeStatusChacker;
    }

    public function handle(App $app) 
    {
    
        $response = Http::get('http://googlePlay.com', [
            'id' => $app->getID(),
            'name' => $app->getName(),
        ]);
        
        $json = $response->json();

        $this->googlePlayeStatusChacker->chacker($response , $app);

        return $json;
    }
}
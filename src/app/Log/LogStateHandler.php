<?php

namespace App\Log;

use Illuminate\Support\Facades\Redis;

class LogStateHandler{



    public function store($event){
        
      

        if($event == "expired" )
        {
            Redis::set('count_expired');
        }

    }

}
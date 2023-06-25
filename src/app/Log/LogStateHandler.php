<?php

namespace App\Log;

use Illuminate\Support\Facades\Redis;

class LogStateHandler{



    public function store($event){
        
   
        $count = Redis::get('expired_count');
        if($count == null){
            $count = 0;
        }

        if($event == "expired" )
        {
            $count ++;
            Redis::set('expired_count',  $count);
        }


        //store more logs...
    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ExpiredSubscriptionsCount extends Controller
{
    //

    public function index(){
        $expiredCout  = Redis::get('expired_count'  );

        if ($expiredCout == null){
            $expiredCout = 0;
        }
        $arr = array('expired_count' => $expiredCout);

        return json_encode($arr);

    }
}

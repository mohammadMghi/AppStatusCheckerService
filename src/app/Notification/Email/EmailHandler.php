<?php
namespace App\Notification\Email;

use App\Mail\StatusChange;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class EmailHandler implements EmailContract
{
    
    public function send($status){
        $preStatus = Redis::get('subscription_status');
       //send email to admin base on status(Subscriptions status can be: active, expired, pending)
       if($preStatus == "expired" && $status == "active")  Mail::to("")->send(new StatusChange());
    }
}
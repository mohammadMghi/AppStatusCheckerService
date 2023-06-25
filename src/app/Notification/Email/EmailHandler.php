<?php
namespace App\Notification\Email;

use App\Mail\StatusChange;
use Illuminate\Support\Facades\Mail;

class EmailHandler{
    
    public function send($status){
       //send email to admin base on status(Subscriptions status can be: active, expired, pending)
       if($status == "expired" && $status == "active")  Mail::to("")->send(new StatusChange());
    }
}
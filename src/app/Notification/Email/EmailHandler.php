<?php
namespace App\Notification\Email;

use Illuminate\Support\Facades\Mail;

class EmailHandler{
    
    public function send($event){
        $message = 'Status : ' . $event->status;
        //send email
        $data = array('name'=>"Virat Gandhi");
   
        Mail::send(['text'=>'mail'], $data, function($message) {
           $message->to('admin@gmail.com', 'Admin')->subject
              ($message);
           $message->from('server@gmail.com','Mohammad');
        });
    }
}
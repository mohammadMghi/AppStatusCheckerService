<?php

namespace App\Listener;

use ChangeState;
use Illuminate\Support\Facades\Mail;

class ChangeStateNotification{
       /**
     * Create the event listener.
     */
    public function __construct( )
    {
        // ...
    }
 
    /**
     * Handle the event.
     */
    public function handle(ChangeState $event): void
    {
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
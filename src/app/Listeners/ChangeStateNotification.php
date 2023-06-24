<?php

namespace App\Listener;

use App\Log\LogStateHandler;
use App\Notification\Email\EmailHandler;
use ChangeState;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Monolog\Handler\MailHandler;

class ChangeStateNotification{
    var EmailHandler $emailHandler; 
    var LogStateHandler $logStateHandler;
    
    /**
     * Create the event listener.
     */
    public function __construct(EmailHandler $emailHandler ,LogStateHandler $logStateHandler  )
    {
        $this->emailHandler  = $emailHandler;
        $this->logStateHandler = $logStateHandler;
    }
 
    /**
     * Handle the event.
     */
    public function handle(ChangeState $event): void
    {
        $preStatus = Redis::get('subscription_status');

        if($event == "expired" && $preStatus == "active") $this->emailHandler->send($event);

        $this->logStateHandler->store($event);

    }
}
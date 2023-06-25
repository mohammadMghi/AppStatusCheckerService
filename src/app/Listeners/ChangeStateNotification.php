<?php

namespace App\Listener;

use App\Log\LogContract;
use App\Log\LogStateHandler;
use App\Notification\Email\EmailContract;
use App\Notification\Email\EmailHandler;
use ChangeState;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Monolog\Handler\MailHandler;

class ChangeStateNotification{
    var EmailHandler $email; 
    var LogContract $logger;
    
    /**
     * Create the event listener.
     */
    public function __construct(EmailContract $email ,LogContract $logger  )
    {
        $this->email  = $email;
        $this->logger = $logger;
    }
 
    /**
     * Handle the event.
     */
    public function handle(ChangeState $event): void
    {
     

        $this->email->send($event->status);

        $this->logger->store($event);

    }
}
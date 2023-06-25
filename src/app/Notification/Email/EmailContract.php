<?php

namespace App\Notification\Email;


interface EmailContract{
    public function send($status);
}
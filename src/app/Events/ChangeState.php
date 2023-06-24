<?php

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChangeState{
    use Dispatchable, InteractsWithSockets, SerializesModels; 

    var string $status;

    public function __construct(
          String $status,
    ) {
        $this->status = $status;
    }
}
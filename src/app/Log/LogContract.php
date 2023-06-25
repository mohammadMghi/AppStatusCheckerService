<?php

namespace App\Log;


interface LogContract{
    public function store($event);
}
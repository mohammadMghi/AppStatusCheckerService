<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class GooglePlayFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'googlePlay-api';
    }
}
 
<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class AppStoreApiFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'appStore-api';
    }
}
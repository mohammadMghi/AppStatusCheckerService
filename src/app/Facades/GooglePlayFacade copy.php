<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Http;

class GooglePlayFacade extends Facade
{
    public function getCurrentWeather(string $city): array
    {
    
        $response = Http::post('http://example.com/users', [
            'name' => 'Steve',
            'role' => 'Network Administrator',
        ]);





        return [
            'city' => $city,
            'temperature' => 25,
            'description' => 'Sunny',
        ];
    }
}
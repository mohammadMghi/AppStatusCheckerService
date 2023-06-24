<?php

namespace App\Facades;

use App\Entities\App;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Http;

class AppStoreFacade extends Facade
{
    public function getCurrentWeather(App $app): array
    {

        $response = Http::get('http://googlePlay.com', [
            'id' => $app->getID(),
            'name' => $app->getName(),
        ]);

        if($response->status() == 200){
            $json = $response->json();
            $stausJsonResponse = json_decode($json);
            foreach( $stausJsonResponse as $key => $value) {
                

             }
            
        } 
        //checks two hours later
        

        return [
            'city' => $city,
            'temperature' => 25,
            'description' => 'Sunny',
        ];
    }
}
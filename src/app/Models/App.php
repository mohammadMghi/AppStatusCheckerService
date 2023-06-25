<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{

   
    protected string $dviceId;

    protected string $name;
    protected string $platform;

    public function setDeviceId(string $dviceId) : void
    {
        $this->dviceId = $dviceId; 
    }

    


    public function getDeviceId() : string
    {
         return $this->dviceId;
    }


    public function setPlatform(string $platform) : void
    {
        $this->platform = $platform; 
    }

    


    public function getPlatform() : string
    {
         return $this->platform;
    }

    public function setName(string $name) : void
    {
        $this->name = $name; 
    }


    public function getName() : string
    {
         return $this->name;
    }

 
}
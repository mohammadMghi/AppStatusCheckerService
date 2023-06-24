<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
 
    protected string $ID ;

    protected string $name ;


    public function setID(string $ID) : void
    {
        $this->ID = $ID; 
    }


    public function getID() : string
    {
         return $this->ID;
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
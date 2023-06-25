<?php

namespace Database\Seeders;

 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


    

        \App\Models\App::create([
         
            'device_id' => "sa3lk23klnmbnm233bn",
            'name' => 'test3' ,
            'platform' =>  "IOS",
        ]);
        \App\Models\App::create([
         
            'device_id' => "456kjopdfg",
            'name' => 'test2' ,
            'platform' =>  "Android",
        ]);

        \App\Models\App::create([
         
            'device_id' => "43545kjkl",
            'name' => 'test1' ,
            'platform' =>  "Android",
        ]);

        \App\Models\App::create([
         
            'device_id' => "435GFDF445kjkl",
            'name' => 'test4' ,
            'platform' =>  "IOS",
        ]);
    }
}

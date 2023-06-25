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
            'platform' =>  "IOS",
        ]);
        \App\Models\App::create([
         
            'device_id' => "456kjopdfg",
            'platform' =>  "Android",
        ]);

        \App\Models\App::create([
         
            'device_id' => "43545kjkl",
            'platform' =>  "Android",
        ]);

        \App\Models\App::create([
         
            'device_id' => "435GFDF445kjkl",
            'platform' =>  "IOS",
        ]);
    }
}

<?php

namespace Tests\Feature;

use App\Models\App;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class WeeklyJobAppstore extends TestCase
{
 

    /** @test */
public function job_is_queued_successfully()
{
    Queue::fake();

    $app = new App("id" , "name");

    dispatch(new WeeklyJobAppstore($app));


    Queue::assertPushed(WeeklyJobAppstore::class, function ($job) use ($app) {
        // Add additional assertions if needed
   
        return $job->data === $app;
    });
}
}

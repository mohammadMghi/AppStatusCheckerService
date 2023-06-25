<?php

namespace App\Jobs;

use App\Models\App;
use App\Facades\AppStoreApiFacade;
use App\Facades\GooglePlayFacade;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class WeeklyJobGooglePlay implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     */
    public function __construct()
    {
    
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        foreach (App::where('platform', 'Android')->cursor() as $app) {
     
            GooglePlayFacade::handle($app);
        }
  
    }
}

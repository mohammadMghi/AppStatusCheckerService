<?php

namespace App\Jobs;

use App\Entities\App;
use App\Facades\AppStoreApiFacade;
use App\Facades\AppStoreFacade;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckAppStoreEveryTwoHoures implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(App $app)
    {
        AppStoreApiFacade::handle($app);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    }
}

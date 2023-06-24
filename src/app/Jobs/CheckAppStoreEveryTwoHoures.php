<?php

namespace App\Jobs;

use App\Models\App;
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

    var App $app;
    /**
     * Create a new job instance.
     */
    public function __construct(App $app)
    {
        $this->app = $app;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        AppStoreApiFacade::handle($this->app);
    }
}

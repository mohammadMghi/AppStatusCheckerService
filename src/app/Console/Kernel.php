<?php

namespace App\Console;

use App\Jobs\WeeklyJobAppstore;
use App\Jobs\WeeklyJobGooglePlay;
use App\Models\App;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
 
        $schedule->job(new WeeklyJobAppstore())->everyMinute();
        $schedule->job(new WeeklyJobGooglePlay())->everyMinute();
 
 

        // $schedule->job(new WeeklyJobAppstore())->weekly()->at('00:00');
        // $schedule->job(new WeeklyJobGooglePlay())->weekly()->at('00:00');
 
        //and more
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

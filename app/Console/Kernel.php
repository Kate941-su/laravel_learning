<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // every minute
        $schedule->command('sample-command')->everyMinute()->emailOutputTo('info@sample.com');
        // every hour
        $schedule->command('sample-command')->hourly();
        // every hour : 08
        $schedule->command('sample-command')->hourlyAt(8);
        // every day
        $schedule->command('sample-command')->daily();
        // every day in 13:00
        $schedule->command('sample-command')->dailyAt('13:00');
        // every day in 3:15
        $schedule->command('sample-command')->cron('15 3 * * *');

        $schedule->command('mail:send-daily-tweet-count-mail')->dailyAt('11:00');
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

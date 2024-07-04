<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\Cancel_check_birthday::class,
        Commands\Check_license_expire::class,
        Commands\Reset_content_popup::class,
        Commands\Check_open_training::class,
        Commands\Check_open_appointments::class,
        Commands\Check_open_activitys::class,
        Commands\Check_open_news::class,
        Commands\Check_open_products::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('cron:cancel_check_birthday')->dailyAt('00:01')->withoutOverlapping(5);
        $schedule->command('cron:check_license_expire')->dailyAt('02:16')->withoutOverlapping(5);
        $schedule->command('cron:reset_content_popup')->dailyAt('03:00')->withoutOverlapping(5);
        $schedule->command('cron:check_open_training')->everyMinute()->withoutOverlapping(5);
        $schedule->command('cron:check_open_appointments')->everyMinute()->withoutOverlapping(5);
        $schedule->command('cron:check_open_activitys')->everyMinute()->withoutOverlapping(5);
        $schedule->command('cron:check_open_news')->everyMinute()->withoutOverlapping(5);
        $schedule->command('cron:check_open_products')->everyMinute()->withoutOverlapping(5);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Telega;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->call(function() {
            $tel = new Telega;
            $tel->loadMonitoring();
        })->everyMinute()->name('mon')->withoutOverlapping();
        
        $schedule1 = new Schedule();
        $schedule1->call(function() {
            $tel1 = new Telega;
            $tel1->checkDomains();
        })->dailyAt('12:00')->name('dom')->withoutOverlapping();
        
        $schedule2 = new Schedule();
        $schedule2->call(function() {
            $tel2 = new Telega;
            $tel2->checkHosting();
        })->everyMinute()->name('host')->withoutOverlapping();
//dailyAt('12:00');
        
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

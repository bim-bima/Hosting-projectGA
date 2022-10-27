<?php

namespace App\Console;

use Notification;
use App\Models\Aktivitas;
use Illuminate\Support\Facades\Log;
use App\Notifications\SlackNotification;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
        $tgl_besok = date('Y-m-d',strtotime("+1 day",strtotime(date("Y-m-d"))));
        $jumlah = Aktivitas::where('reminder', '=', 'reminder', 'and')->where('start_date', '=', $tgl_besok)->count();
        if($jumlah > 0){
        Notification::route('slack', env('SLACK_WEBHOOK'))->notify(new SlackNotification());
        }
        })->dailyAt('17:44');
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

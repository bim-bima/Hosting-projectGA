<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\SlackMessage;
use App\Models\Aktivitas;


class SlackNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Get the slack representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toSlack($notifiable)
    {
        $tgl_besok = date('Y-m-d',strtotime("+1 day",strtotime(date("Y-m-d"))));
        $jumlah = Aktivitas::where('reminder', '=', 'reminder', 'and')->where('start_date', '=', $tgl_besok)->count();
        $reminder = Aktivitas::where('reminder', '=', 'reminder', 'and')->where('start_date', '=', $tgl_besok)->get();

        $notif = array();
        foreach($reminder as $minder){
            $mind = $minder->title;
            $tanggal = $minder->start_date;
            $notif[] = array($mind);
        }
        $result = preg_replace('/[^a-zA-Z0-9\, ]/', '', json_encode($notif));
                return (new SlackMessage)->content("REMINDER \nAKTIFITAS HARI ESOK :\n...\n".$result."."."\n...\n"."\n");      
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

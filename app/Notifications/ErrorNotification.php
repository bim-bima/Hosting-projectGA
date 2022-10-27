<?php

namespace AppNotifications;

use IlluminateBusQueueable;
use IlluminateNotificationsNotification;
use IlluminateContractsQueueShouldQueue;
use IlluminateNotificationsMessagesSlackMessage;

class ErrorNotification extends Notification
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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return IlluminateNotificationsMessagesMailMessage
     */
    public function toSlack($notifiable)
    {
        return (new SlackMessage)
                    -&gt;from('laravel', ':ghost:')
                    -&gt;to('#general')
                    -&gt;content('Hello, my first slack message send from laravel.');
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

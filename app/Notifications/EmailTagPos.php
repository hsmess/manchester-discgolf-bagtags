<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailTagPos extends Notification
{
    use Queueable;
    protected $ctp = null;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($ctp)
    {
       $this->ctp = $ctp;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Manchester Bagtags - Current Tag')
                    ->line('This is an email reminder for your current (or newly assigned) bagtag for the 2023 season')
                    ->line('Your current bagtag: ' . $this->ctp)
                    ->line('If you physically have another tag than this in your possession, please click the button below and update your tag, or scan the QR code on your tag.')
                    ->action('Update your tag!', url('/'))
                    ->line('If you have no bagtag or this is the first time you are seeing this email, you can now collect it from any committee member at the course (after 01/04/2023).');
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

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
                    ->subject('Manchester Bagtags - Tag Assigned')
                    ->line('Welcome to the Manchester BagTag 2021 Season')
                    ->line('Tags have now been assigned, and your starting tag is: ' . $this->ctp)
                    ->line('If you selected shipping, this will be mailed tomorrow, and if not, you can collect your tag from the container by meeting anyone who has keys')
                    ->line('Also, the new dashboard where the current tags are listed, and where you can update your tag when you trade is now available.')
                    ->action('Check it out!', url('/'))
                    ->line('Thanks for signing up, and making this our biggest "tags" year ever, already!');
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

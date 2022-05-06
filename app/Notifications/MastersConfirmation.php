<?php

namespace App\Notifications;

use App\Models\TournamentEntry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MastersConfirmation extends Notification
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
        $total = TournamentEntry::with('payment')->where('tournament_id',3)->whereHas('payment')->count();
        return (new MailMessage)
            ->subject('Manchester Masters 2022')
            ->line('This is a quick email to thank you for signing up for Manchester Masters')
            ->line('You are registrant: ' . $total)
//            ->action('Check the PDGA page (updated every 24 hours)', 'https://www.pdga.com/tour/event/56573')
            ->line('Thanks for signing up, and see you on the course');
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

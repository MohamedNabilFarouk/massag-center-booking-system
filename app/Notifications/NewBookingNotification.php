<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewBookingNotification extends Notification
{
    use Queueable;
    // private $booking;
    private $details;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    // public $data=[];
    public function __construct($data)
    {
        $this->details = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
            'title_en' =>'New Booking For  '. $this->details['package']['title_en'],
            'title_ar' =>'لديك حجز جديد لباقة '. $this->details['package']['title_ar'],
            'id' =>$this->details['booking']['id']


        ];
    }
}

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Carbon\Carbon;

class Slack extends Notification
{
    use Queueable;

    protected $rubro;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($rubros)
    {
        $this->rubro=$rubros;
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
                    ->line('Gracias por registrarte !.')
                    ->action('Te invitamos a que entres y descubras nuestra plataforma', url('https://licitapp.cl/login'))
                    ->line('GRACIAS POR USAR NUESTRA APLICACIÓN!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
      
        return [

        ];
    }
}
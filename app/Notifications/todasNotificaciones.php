<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class todasNotificaciones extends Notification
{
    use Queueable;

  public $codigo;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($codigo)
    {
        $this->codigo = $codigo;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
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
    public function toDataBase($notifiable)
    {
    
        return [
        
        'codigo' => $this->codigo,
        'user' => $notifiable
            
        ];
    }
     public function toArray($notifiable)
    {
    
        return [
        
            
        ];
    }
     public function toBroadcast($notifiable)
    {
    
        return new BroadcastMessage( [
        
        'codigo' => $this->codigo,
        'user' => $notifiable
            
        ]);
    }
}

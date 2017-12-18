<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class foroPreguntas extends Notification
{
    use Queueable;


    protected $fechaForo;
    protected $codigo;

    
    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($codigo, $fechaForo)
    {
        $this->fechaForo = $fechaForo;
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
    $url = url('/buscarL?codigo='.$this->codigo);
        return (new MailMessage)
                    ->greeting("Hola, has creado una nueva notificacion.")
                    ->subject('Notificacion: Cierre del foro de la licitacion '.$this->codigo.'')
                    ->line('Se creo una notificacion sobre la fecha de cierre del foro de la licitacion: '.$this->codigo.'')
                    ->line('El foro de preguntas cierra el:'.$this->fechaForo.'')
                    ->action('Ver licitacion', $url)
                    ->line('Gracias por usar nuestras herramientas');
                    
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

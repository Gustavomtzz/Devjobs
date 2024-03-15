<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{

    use Queueable;

    public $id_vacante;
    public $nombre_vacante;
    public $usuario_id;

    /**
     * Create a new notification instance.
     */
    public function __construct($id_vacante, $nombre_vacante, $usuario_id)
    {
        $this->id_vacante = $id_vacante;
        $this->nombre_vacante = $nombre_vacante;
        $this->usuario_id = $usuario_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {

        $url = url('/notificaciones/' . $this->id_vacante);

        return (new MailMessage)
            ->line('Tienes una nueva notificación.')
            ->line('La vacante es: ' . $this->nombre_vacante)
            ->action('Ver Notificaciones', $url)
            ->line('Gracias por utilizar DevJobs!');
    }

    /**
     * Almacena las notificaciones en la DB.
     *
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable)
    {
        return [
            'id_vacante' => $this->id_vacante,
            'nombre_vacante' => $this->nombre_vacante,
            'usuario_id' => $this->usuario_id,
        ];
    }
}

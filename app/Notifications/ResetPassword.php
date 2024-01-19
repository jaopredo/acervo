<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPassword extends Notification implements ShouldQueue
{
    use Queueable;

    public $token;

    /**
     * Create a new notification instance.
     */
    public function __construct($token)
    {
        $this->token = $token;
        $this->connection = 'database';
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = config('app.url') . "/change-password/" . $this->token;

        $msg = (new MailMessage)
                    ->greeting('RESETANDO SENHA')
                    ->from('acervo@multimeios.com', 'Multimeios')
                    ->subject('Alteração da Senha')
                    ->greeting('Olá! Você deseja redefinir sua senha?')
                    ->line('Enviamos esta mensagem pois sua conta requisitou um link de alteração de senha, para alterar sua senha, clique no botão abaixo')
                    ->salutation('Com Atenção, Acervo Multimeios')
                    ->action('RESETAR', $url)
                    ->line('Se você não pediu para resetar a senha, ignore a mensagem, por favor')
                    ->level('info')
        ;
        return $msg;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegistrationNotification extends Notification
{
    use Queueable;
    public $user;
    public $token;public function __construct($user,$token,$pass)
    {
        $this->user = $user;
        $this->token = $token;
        $this->pass = $pass;
    }
    public function via($notifiable)
    {
        return ['mail','database'];
    }
    public function toMail($notifiable)
    {
        $token = $this->token;
        $pass = $this->pass;
        return (new MailMessage)->subject('Verifikasi Email')->from('noreplysayembaraikn@gmail.com')->view('page.email.registration',compact('notifiable','token','pass'));
    }
    public function toArray($notifiable)
    {
        return [
            'tipe' => 1,
            'nama' => $this->user->name,
            'pesan' => "Hai ".$this->user->name.", selamat bergabung di Sayembara IKN. Harap lakukan verifikasi email."
        ];
    }
}

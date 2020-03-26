<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomerResetPassword extends Notification
{
    public function __construct($token)
    {
        $this->token = $token;
    }


    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from('minhquan3197@gmail.com')
            ->subject('Đổi mật khẩu')
            ->line('Bạn càn nhấp vào link dưới để đổi mật khẩu')
            ->action('Reset Password', url( "/password/reset/" . $this->token ));
    }
}

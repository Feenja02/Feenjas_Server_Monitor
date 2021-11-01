<?php

namespace App\Notifications;

use App\Models\Datavalue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class HumWarningNotification extends Notification
{
    private $datavalue;

    public function __construct(Datavalue $datavalue)
    {
        $this->datavalue = $datavalue;
    }

    public function via($notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->error()
            ->greeting(__('messages.greeting'))
            ->line(__('messages.val_limit_reached', ['CLIENT' => $this->datavalue->client->name]))
            ->line(__('messages.Hum').': '.number_format($this->datavalue->humidity,2, ',' , '.').' %', )
            ->action(__('messages.to_dashboard'), url('/dashboard'));
    }

    public function toArray($notifiable): array
    {
        return [
            'client_id'=>$this->datavalue->client->id,
        ];
    }
}

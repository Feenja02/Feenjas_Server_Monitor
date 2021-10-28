<?php

namespace App\Notifications;

use App\Models\Client;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ClientDownNotification extends Notification
{
    private $client;
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function via($notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->error()
            ->greeting('Hallo,')
            ->line('der Client '.$this->client->name.' ist ausgefallen. Bitte dringend überprüfen!');
    }

    public function toArray($notifiable): array
    {
        return [
            'client_id'=>$this->client->id,
        ];
    }
}

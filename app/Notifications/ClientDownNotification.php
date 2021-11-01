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
            ->greeting(__('messages.greeting'))
            ->line(__('messages.client_down_mail', ['CLIENT' => $this->client->name]));
    }

    public function toArray($notifiable): array
    {
        return [
            'client_id'=>$this->client->id,
        ];
    }
}

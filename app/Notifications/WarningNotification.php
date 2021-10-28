<?php

namespace App\Notifications;

use App\Models\Datavalue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class WarningNotification extends Notification
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
            ->greeting('Hallo, ')
            ->line('die gemessenen Werte von ' . $this->datavalue->client->name . ' hat folgende Grenzwerte überschritten:')
            ->line('Temperatur: '.number_format($this->datavalue->temperature,2, ',' , '.').' °C')
            ->line('Luftfeuchtigkeit: '.number_format($this->datavalue->humidity,2, ',' , '.').' %', )
            ->action('Zum Dashboard', url('/dashboard'));
    }

    public function toArray($notifiable): array
    {
        return [
            'client_id'=>$this->datavalue->client->id,
        ];
    }
}

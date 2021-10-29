<?php

namespace App\Jobs;

use App\Models\Client;
use App\Models\User;
use App\Notifications\ClientDownNotification;
use App\Notifications\TempWarningNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class WatchdogJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $clients = Client::query()->get();
        foreach ($clients as $client) {
            $last = $client->datavalues->last();
            if ($last) {
                if ($last->created_at->addMinutes(5) < Carbon::now() && $client->is_activated == 1) {
                    /*Log::warning('oh oh');*/
                    if ($client->last_warning_sent_at==null || $client->last_warning_sent_at->addHours(2) < Carbon::now()){
                        Notification::send(User::query()->get(), new ClientDownNotification($client));
                        $client->last_warning_sent_at = Carbon::now();
                        $client->save();
                    }
                } else {
                    Log::info('Alles Super :)');
                }
            }
        }

    }
}

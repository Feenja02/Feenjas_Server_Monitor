<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\HumWarningNotification;
use App\Notifications\TempWarningNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Notification;



class ApiController extends Controller
{
    public function recieve_data(Request $request)
    {
        $datavalue = \App\Models\Datavalue::create([
            'client_id' => $request->input('cid'),
            'temperature' => $request->input('temp'),
            'humidity' => $request->input('hum')
        ]);
        $client=$datavalue->client;
        if($datavalue->temperature < 18 || $datavalue->temperature > 27){
            if ($client->last_temp_warning_sent_at==null || $client->last_temp_warning_sent_at->addHours(2) < Carbon::now()) {
                Notification::send(User::query()->get(), new TempWarningNotification($datavalue));
                $client->last_temp_warning_sent_at = Carbon::now();
                $client->save();
            }
        }elseif($datavalue->humidity < 35 || $datavalue->humidity > 60){
            if ($client->last_hum_warning_sent_at==null || $client->last_hum_warning_sent_at->addHours(2) < Carbon::now()) {
                Notification::send(User::query()->get(), new HumWarningNotification($datavalue));
                $client->last_hum_warning_sent_at = Carbon::now();
                $client->save();
            }
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\WarningNotification;
use Illuminate\Http\Request;
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
        if(($datavalue->temperature < 18 || $datavalue->temperature > 27) || ($datavalue->humidity < 30 || $datavalue->humidity > 60)) {
            Notification::send(User::query()->get(), new WarningNotification($datavalue));
            $datavalue->warning_sent = 1;
            $datavalue->save();
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Carbon;

class TimelineController extends Controller
{
    public function get(Client $client)
    {
        //dd($client);
        $now = Carbon::now()->hour;
        //Carbon::now()->sub
        $hours = array();
        for($i=0;$i<24;$i++) {
            $bla = ($now-$i);
            if($bla<0) $bla= 24+$bla;
            $hours[]=$bla;
        }
        $graph_data = array();
        $data = $client->datavalues()->where('created_at','>',Carbon::now()->subHours(24))->get();
        foreach ($data as $dat) {
            $entry = ['ax'=>$dat->temperature,'ay'=>$dat->created_at->toDateTimeString(),'bx'=>$dat->humidity,'by'=>$dat->created_at->toDateTimeString()];
            $graph_data[]= $entry;
        }
        return view('timeline.index', [$client,'graph_data'=>$graph_data]);
    }
}

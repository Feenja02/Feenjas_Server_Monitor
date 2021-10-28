<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        //
    }

    public function destroy(Client $client)
    {
        Client::destroy($client->id);
        return redirect()->route('clients');
    }

    public function edit(Request $request, Client $client)
    {
        return view('clients.edit', ['client'=>$client]);
    }
    public function update(Request $request, Client $client)
    {
       // $client->name = $request->input('name');
        $client->fill($request->all());
        $client->save();
        return redirect()->route('clients');
    }

    public function activate(Client $client)
    {
        $client->is_activated=1;
        $client->save();
        return redirect()->route('dashboard');
    }

    public function deactivate(Client $client)
    {
        $client->is_activated=0;
        $client->save();
        return redirect()->route('dashboard');
    }

}

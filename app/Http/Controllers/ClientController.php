<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return response()->json(Client::get());
    }

    public function save(Request $request)
    {
        $client = new Client();
        $client->name = $request->get('name');
        $client->email = $request->get('email');
        $client->contact_number = $request->get('contact_number');
        $client->save();
        return response()->json('Saved');
    }

    public function edit($id)
    {
        return response()->json(Client::where('id', $id)->first());
    }

    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $client->name = $request->get('name');
        $client->email = $request->get('email');
        $client->contact_number = $request->get('contact_number');
        $client->save();
        return response()->json('Updated');
    }
}

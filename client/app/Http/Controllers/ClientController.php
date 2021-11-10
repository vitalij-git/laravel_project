<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients=Client::all();
        return view ('client.index', ['clients'=>$clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view ('client.createclient');
    }
    public function createClients(Request $request)
    {
        $clientsCount =$request->inputs_numbers;

        if(!$clientsCount){
            $clientsCount=3;
        }
        if($request->clientInput == "1") {
            $clientsCount++;
        } else if($request->clientInput == "0") {
            $clientsCount--;
        }
       return view ('client.createclients', ['clientsCount'=>$clientsCount]);
    }
    public function createWithJS()
    {
       return view ('client.createclientjs');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->AddClient == "1"){
            $client = new Client;
            $client->name=$request->client_name;
            $client->surname=$request->client_surname;
            $client->description=$request->client_description;
            $client->save();
            return redirect()->route('client.index');
        }
        else{
            $clientCount= count($request->client_name);
            for ($i = 0; $i<$clientCount; $i++ ) {
                $client = new Client;
                $client->name=$request->client_name;
                $client->surname=$request->client_surname;
                $client->description=$request->client_description;
                $client->save();
                return redirect()->route('client.index');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}

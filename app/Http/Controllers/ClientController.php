<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Customer;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // client home page
    public function home()
    {
        return view('customer.insert');
    }

    // client insert page
    public function insert(Request $request)
    {
        // dd($request->all());
        // dd(Carbon::now()->toArray());

        // insert data first way
        $data = [
            'name' => $request->clientName,
            'address' => $request->clientAddress,
            'phone' => $request->clientPhoneNumber,
            'created_at' => Carbon::now(),
            'updated_at' => '2025-3-39'
        ];

        Client::create($data);
        return "Register Successfully.";

        // insert data sec way
        // $record = new Customer;
        // $record->name = $request->clientName;
        // $record->address = $request->clientAddress;
        // $record->phone = $request->clientPhoneNumber;
        // $record->save();

        // return "created successfully...";
    }

    public function read()
    {
        // read data first way
        // dd(Client::find(2)->toArray());
        // dd(Client::first()->toArray());
        // dd(Client::where('id', '2')->get()->toArray());

        // read data second way
        $readData = new Client;
        dd($readData->findOrFail(2)->toArray());
    }
}

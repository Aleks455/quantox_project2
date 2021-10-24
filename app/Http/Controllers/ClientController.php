<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;


class ClientController extends Controller
{
    //
    public function index()
    {
        // \Illuminate\Support\Facades\DB::listen(function($query){
        //     logger($query->sql);
        // });
        return view('clients.show', [         
            'clients' => auth()->user()->clients,
        ]);
    }

    public function index2()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:225',
            'company_number' => 'required|max:225|unique:clients,company_number',
            'vat_id' => 'required|max:225',
            'bank_account' => 'required|numeric',
            'phone_number' => 'required|numeric',
            'email' => 'required|email|max:255|unique:clients,email',
            'address' => 'required|max:225',
            'city' => 'required|max:225',
            'postal_code' => 'required|size:5',
            'country' => 'required|max:225',
        ]);

        // varijanta 1
        // Client::create([
        //     'name' => $request->name,
        //     'user_id'=>auth()->user()->id,
        //     'company_number' => $request->company_number,
        //     'vat_id' => $request->vat_id,
        //     'bank_account' => $request->bank_account,
        //     'phone_number' => $request->phone_number,
        //     'email' => $request->email,
        //     'address' => $request->address,
        //     'city' => $request->city,
        //     'postal_code' => $request->postal_code,
        //     'country' => $request->country,
        // ]);

        // varijanta2
        // Client::create($request->All[]);

        auth()->user()->clients()->create([
            'name' => $request->name,
            'company_number' => $request->company_number,
            'vat_id' => $request->vat_id,
            'bank_account' => $request->bank_account,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
        ]);

        //message if it's stored successfully

        return redirect()->route('clients');

    }


}

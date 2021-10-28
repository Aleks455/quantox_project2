<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
            'clients' => auth()->user()->clients()->paginate(10),
            //paginate
        ]);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function show (Client $client)
    {
        return view('clients.show-one', ['client' => $client]);
    }

    public function edit (Client $client)
    {
        return view('clients.edit', ['client' => $client]);
    }

    public function update (Request $request)
    {

        // validate first 
        
        $this->validate($request,[
            'name' => 'required|max:225',
            'company_number' => 'required|max:225',
            'vat_id' => 'required|max:225',
            'bank_account' => 'required|numeric',
            'phone_number' => 'required',
            'email' => 'required|email|max:255',
            'address' => 'required|max:225',
            'city' => 'required|max:225',
            'postal_code' => 'required|size:5',
            'country' => 'required|max:225',
        ]);

        //ali onda ne moze unique da se proverava

        $data = Client::find($request->id);
        $data->name = $request->name;
        $data->company_number = $request->company_number;
        $data->vat_id = $request->vat_id;
        $data->bank_account = $request->bank_account;
        $data->phone_number = $request->phone_number;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->city = $request->city;
        $data->postal_code = $request->postal_code;
        $data->country = $request->country;
        $data->save();

        // $client->update($request()->all()); //proveriti
        return redirect()->route('clients');
    }


    public function destroy (Client $client)
    {
        $client->delete();
        return redirect()->route('clients');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:225',
            'company_number' => 'required|max:225|unique:clients,company_number',
            'vat_id' => 'required|max:225',
            'bank_account' => 'required|size:18',
            'phone_number' => 'required',
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

    //odvojiti validaciju?

    // public function validate (Request $request)
    // {
    //    $request =  $this->validate($request,[
    //         'name' => 'required|max:225',
    //         'company_number' => 'required|max:225|unique:clients,company_number',
    //         'vat_id' => 'required|max:225',
    //         'bank_account' => 'required|numeric',
    //         'phone_number' => 'required|numeric',
    //         'email' => 'required|email|max:255|unique:clients,email',
    //         'address' => 'required|max:225',
    //         'city' => 'required|max:225',
    //         'postal_code' => 'required|size:5',
    //         'country' => 'required|max:225',
    //     ]);
    //     return $request;
    // }

}

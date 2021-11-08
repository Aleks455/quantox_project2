<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;




class UserController extends Controller
{
    public function index()
    {
    //    dd(auth()->user());
        return view('user.profile', [
            'user' => auth()->user()
        ]);
    }

    public function edit ()
    {
        return view('user.update', ['user' => auth()->user()]);
    }

    public function update (Request $request)
    {

        //treba validacija

        $data = User::find($request->id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->password =  Hash::make($request->password);
        $data->phone_number = $request->phone_number;
        $data->company_name = $request->company_name;
        $data->company_number = $request->company_number;
        $data->vat_id = $request->vat_id;
        $data->bank_account = $request->bank_account;
        $data->company_address = $request->company_address;
        $data->city = $request->city;
        $data->postal_code = $request->postal_code;
        $data->state = $request->state;
        $data->save();

        //message - update successful
        return redirect()->route('user');
    }


}

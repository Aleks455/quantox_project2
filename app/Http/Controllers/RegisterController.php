<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Psr\Http\Message\RequestInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {      
        //validate
        //store the user
        //sign the user in
        //rederect the user
    
        $this->validate($request,[
            'email' => 'required|email|max:255|unique:users,email',
            'first_name' => 'required|max:225',
            'last_name' => 'required|max:225',
            'password' => 'required|confirmed|min:8',
            'terms' => 'required',
        ]);

       
        // auth()->login(User::create($attributes));

        // $fillable = $this->validate($request,[
        //     'company_name' => 'required|max:225|unique:users,company_name',
        //     'company_number' => 'required|max:225|unique:users,company_number',
        //     'vat_id' => 'required',
        //     'company_address' => 'required|mixed',
        //     'city' => 'required',
        //     'state' => 'required',
        //     'postal_code' => 'required|size:5',
        //     'phone_number' => 'required|numeric',
        //     'bank_account' => 'required|numeric|size:18',
        // ]);
        
        User::create([
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => Hash::make($request->password),

    //         'company_name' => $request->company_name,
    //         'company_number' => $request->company_number,
    //         'vat_id' => $request->vat_id,
    //         'company_address' => $request->company_address,
    //         'city' => $request->city,
    //         'state' => $request->state,
    //         'postal_code' => $request->postal_code,
    //         'phone_number' => $request->phone_number,
    //         'bank_account' => $request->bank_account
        ]);

        // sign in user

        Auth::attempt($request->only('email','password'));
        // auth()->user(); //auth helper gives back user model


        // return redirect('/')->with('success', 'Your account has been created.');
        return redirect()->route('admin');

    }

   
}

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
        $this->validate($request,[
            'email' => 'required|email|max:255|unique:users,email',
            'first_name' => 'required|max:225',
            'last_name' => 'required|max:225',
            'password' => 'required|confirmed|min:8',
            'terms' => 'required',
        ]);

        User::create([
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => Hash::make($request->password),
            'remember_token' =>request()->_token,
        ]);

        Auth::attempt($request->only('email','password'));

        return redirect()->route('user');

    }

   
}

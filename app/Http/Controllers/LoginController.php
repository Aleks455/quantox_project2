<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{

    public function index()
    {

        return view('login');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
      
        if (! auth()->attempt($attributes, request()->remember)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        } 
        //ovo iznad ili 
        // if(!auth()->attempt($request->only('email','password'))) {
        //     return back()->with('status', 'Invalid login details');
        // }

        session()->regenerate();

        return redirect('/admin');
        // ->with('success', 'Welcome Back!'); napraviti kasnije
    }
}

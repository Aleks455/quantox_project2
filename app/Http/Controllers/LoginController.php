<?php

namespace App\Http\Controllers;

use App\Http\Request\LoginRequest;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    // public function store(LoginRequest $request) //kasnije promeni ime u login
    // {
    //     $email = $request->input('email'); //ili get umesto input
    //     $password = $request->input('password');

    //     $user_model = new User();
    //     $user_model->email = $email;
    //     $user_model->password = $password;

    //     $results =  $user_model->fetchRow();

    //     $row = $results->count();

    //     if($row){
    //         $request->session()->put('user', $results);
    //         // session()->get('user');
    //         // dd(session()->get('user'));
    //         return redirect()->route('dashboard.index');
    //     } else {
    //         return redirect('/register')->with('message', 'Wrong credentials!');
    //     }

    // }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // $attributes = $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);


        if (! Auth::attempt($attributes, request()->remember)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        } 


        // if (! auth()->attempt($attributes)) {
        //     throw ValidationException::withMessages([
        //         'email' => 'Your provided credentials could not be verified.'
        //     ]);
        // } 

        
       
    
        // $request->session()->put('user', $attributes['email']);
        //         session()->get('user');
        //         // dd(session()->get('user'));

        session()->regenerate();
        // dd();

        return redirect('/dashboard')->with('message', 'Welcome ' . auth()->user()->first_name . ' !');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('registration.register');
    }

    public function store()
    {
        //crete the user
        request()->validate([
            'email' => 'required|email|max:255|unique:user,email',
            'first_name' => 'required|max:225',
            'last_name' => 'required|max:225',
            'password' => 'required|max:225|Password::min(8)',
            'company_name' => 'required|max:225|unique',
            'company_number' => 'required|max:225|unique',
            'vat_id' => 'required',
            'company_address' => 'required|mixed',
            'city' => 'required',
            'state' => 'required',
            'postal_code' => 'required|size:5',
            'phone_number' => 'required|numeric|min:9|max:10',
            'bank_account' => 'required|numeric|size:18', 
        ]);
        
    }
}

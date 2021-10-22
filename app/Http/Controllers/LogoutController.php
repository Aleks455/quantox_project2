<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
// use Illuminate\Contracts\Auth\Factory;
// use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    //
    public function destroy()
    {
        // dd('asd');
        Auth::logout();
        
        return redirect()->route('login');
    }
}

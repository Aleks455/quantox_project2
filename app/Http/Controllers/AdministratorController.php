<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;


class AdministratorController extends Controller
{
    public function index()
    {
        return view('admin');
    }

  

}

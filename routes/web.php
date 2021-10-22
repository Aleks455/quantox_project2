<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'index']);


Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest');

Route::post('/logout', [LogoutController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('/admin', [AdministratorController::class, 'index'])->name('admin');



// Route::get('/invoice', function () {
//     return view('invoices.invoice');
// });




// Route::post('/add_client', [AddClientController::class, 'store']);

// Route::get('/logout', function () {
//     return view('logout');
// });


// Route::get('/register_company', function () {
//     return view('registration.register_company');
// });
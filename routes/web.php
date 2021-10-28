<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;

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

Route::get('/', function(){
    if('auth'){
        return redirect(route('user'));
    }else {
        return redirect(route('login'));
 
    }

});


Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest');

Route::post('/logout', [LogoutController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('/user', [UserController::class, 'index'])->name('user')->middleware('auth');
Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');
Route::post('/user/update/{user:id}', [UserController::class, 'update'])->name('user.update')->middleware('auth');

Route::get('/clients', [ClientController::class, 'index'])->name('clients')->middleware('auth');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create')->middleware('auth');
Route::post('/clients/create', [ClientController::class, 'store'])->middleware('auth');
Route::get('/clients/show/{client:name}', [ClientController::class, 'show'])->name('client.show')->middleware('auth');
Route::get('/clients/edit/{client:name}', [ClientController::class, 'edit'])->name('client.edit')->middleware('auth');
Route::post('/clients/update', [ClientController::class, 'update'])->name('client.update')->middleware('auth');
Route::get('/clients/delete/{client:name}', [ClientController::class, 'destroy'])->name('client.destroy')->middleware('auth');

Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices')->middleware('auth');
Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create')->middleware('auth');
Route::post('/invoices/create', [InvoiceController::class, 'store'])->middleware('auth');
Route::get('/invoices/show/{invoice:id}', [InvoiceController::class, 'show'])->name('invoice.show')->middleware('auth');
Route::get('/invoices/show/{invoice:id}', [InvoiceController::class, 'edit'])->name('invoice.edit')->middleware('auth');
Route::post('/clients/update', [ClientController::class, 'update'])->name('client.update')->middleware('auth');
Route::get('/invoices/delete/{invoice:id}', [InvoiceController::class, 'destroy'])->name('invoice.destroy')->middleware('auth');

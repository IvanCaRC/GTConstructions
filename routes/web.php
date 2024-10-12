<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use  App\Http\Controllers\HomeController;
use App\Livewire\ShowUsers;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Rutas de Login

Route::get('/', [HomeController::class, 'viewVi'])->middleware('nocache')->name('/');
Route::get('admins/index', [adminController::class, 'index'])->middleware('auth', 'nocache')->name('admins.index');
Route::get('admins/registrer', [adminController::class, 'viewRegis'])->middleware('auth', 'nocache')->name('admins.register');


Route::post('logins/login', [LoginController::class, 'login'])->name('logins.login');
Route::get('logins/logout', [LoginController::class, 'logout'])->name('logins.logout');




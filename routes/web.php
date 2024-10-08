<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
Route::view('/login', "login")->middleware('nocache')->name('login');
Route::view('/registro', "register")->name('registro'); 
Route::view('/forgetPassword', "forgetPassword")->middleware('nocache')->name('forgetPassword'); 
Route::view('/updatePassword', 'updatePassword')->middleware('nocache')->name('updatePassword');
Route::view('/privada', "index")->middleware('auth', 'nocache')->name('privada');

Route::post('/validar-registro', [LoginController::class, 'register'])-> name('validar-registro');
Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'validation'])->name('login.validation');
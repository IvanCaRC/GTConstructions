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
Route::get('admins/index',[adminController::class,'index'])->middleware('auth', 'nocache')->name('admins.index');
Route::get('admins/Roles', [adminController::class,'roles'])->middleware('auth', 'nocache')->name('admins.roles');
Route::get('admins/cambiosContraseña', [adminController::class,'cambioContra'])->middleware('auth', 'nocache')->name('admins.cambioContra');
Route::get('admins/registrer', [adminController::class, 'viewRegis'])->middleware('auth', 'nocache')->name('admins.register');
Route::get('/solicitudcontraseña', [HomeController::class, 'viewUpdPass'])->middleware('nocache')->name('solicitud.UpdPass');

Route::post('logins/login', [LoginController::class, 'login'])->name('logins.login');
Route::post('/solicitudcontraseña', [HomeController::class, 'validateEmail'])->name('solicitud.validateEmail');
Route::get('logins/logout', [LoginController::class, 'logout'])->name('logins.logout');
Route::get('logins/logout', [LoginController::class, 'logout'])->name('logins.logout');


Route::get('livewire/show-user', ShowUsers::class)->middleware('auth', 'nocache');
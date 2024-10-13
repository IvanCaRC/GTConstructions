<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index()
    {
        return view('admins.index');
    }

    public function viewRegis()
    {
        return view('admins.register');
    }

    public function roles()
    {
        return view('admins.roles');
    }

    public function cambioContra()
    {
        return view('admins.cambiosContraseña');
    }
}

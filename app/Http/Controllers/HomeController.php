<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function viewVi()
    {
        return view('logins.login');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\password;

class LoginController extends Controller
{

    public function register(Request $request)
    { //Validar los datos
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;

        $user->password =  Hash::make($request->password);
        $user->save();

        Auth::login($user);
        return redirect(route('privada'));
    }

    //Funcion de Validacion de Formulario Login
    public function validation(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:5|confirmed',
        ]);
        return redirect()->back()->with('Completado', 'Bienvenido al Sistema');
    }

    public function login(Request $request) {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];
        $remember = ($request->has('remember')?true : false);
        if(Auth::attempt($credentials,$remember)){
            $request->session()->regenerate();
            return redirect()->intended('privada');
        }else{
            return redirect('login');
        }
    }
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}

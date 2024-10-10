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

    public function login(Request $request) {

        //Validar el formulario
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        //Capturar credenciales
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        //Manejo del campo "recordarme"
        $remember = ($request->has('remember')?true : false);
        //Autenticacion del usuario
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            //Mensaje de acceso exitoso
            session()->flash('success','Sesion iniciada exitosamente');
            return redirect()->intended('privada');
        }else{//En caso de que la autenticacion falle
            session()->flash('error','Correo y/o contraseña incorrectos');
            return back()->withErrors([
                'email' => 'Verifica este campo',
                'password' => 'Verifica este campo',
            ])->withInput();
            return redirect('login')->withInput();
        }
    }

    
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}

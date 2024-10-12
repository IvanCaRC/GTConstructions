<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function viewVi()
    {
        return view('logins.login');
    }

    public function viewUpdPass()
    {
        return view('logins.contraseñaCambios');
    }

    public function validateEmail(Request $request) {
        // Validar el campo de correo electrónico
        try {
            $request->validate([
                'email' => 'required|email|exists:users,email',
            ]);
    
            // Mensaje de éxito si el email existe
            session()->flash('success', 'Tu solicitud de envio correctamente, espera recibir la confirmacion por correo');
        } catch (\Exception $e) {
            // Mensaje de error si la validación falla
            session()->flash('error', 'Tu correo no coincide con los registros');
        }
    
        return redirect('/solicitudcontraseña')->withInput();
    }
    
    
}

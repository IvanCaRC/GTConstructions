<?php

namespace App\Http\Controllers;

use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\Mail;
use Exception;

class MailController extends Controller
{
    public function sendPasswordResetMail()
    {
        try {
            Mail::to('your_test_email@example.com')->send(new PasswordResetMail());
            return "Mensaje enviado";
        } catch (Exception $e) {
            return "Error al enviar el correo: " . $e->getMessage();
        }
    }
}

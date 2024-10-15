<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function build()
    {
        return $this->from('administracion@gtcgroup.com.mx', 'Administracion GTCgroup')
                    ->subject('Restablecimiento de Contraseña')
                    ->view('emails.password_reset');
    }
}


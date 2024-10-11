{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head> --}}
@extends('layouts.plantilla')

@section('title', 'registro de usuario')
@section('activeUsuarios', 'active')
@section('contend')

    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border-radius: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            border-color: #5a5c69;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #5a5c69;
            border: none;
        }

        .btn-primary:hover {
            background-color: #4e555b;
        }

        .img-fluid {
            border-radius: 0.5rem;
            object-fit: cover;
            width: 100px;
            height: auto;
            margin-left: 10px;
            /* Espacio más pequeño entre el texto y la imagen */
        }

        .header {
            display: flex;
            justify-content: start;
            align-items: center;
        }
    </style>
    <div class="container py-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-body p-5">
                        <div class="header mb-3">
                            <h5 class="fw-normal mb-0">Registrar Usuario</h5>
                            <img src="{{ asset('img/adduser.png') }}" alt="Agregar Usuario" class="img-fluid">
                        </div>
                        <form method="POST" >
                            @csrf
                            <div class="mb-3">
                                <label for="userInput" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="userInput" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="apellidoInput1" class="form-label">Primer Apellido</label>
                                <input type="text" class="form-control" id="apellidoInput1" name="apellido1" required>
                            </div>

                            <div class="mb-3">
                                <label for="apellidoInput2" class="form-label">Segundo Apellido</label>
                                <input type="text" class="form-control" id="apellidoInput2" name="apellido2" required>
                            </div>

                            <div class="mb-3">
                                <label for="emailInput" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="emailInput" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="phoneInput" class="form-label">Teléfono Celular</label>
                                <input type="text" class="form-control" id="phoneInput" name="phone" required
                                    minlength="10" maxlength="10" pattern="[0-9]{10}"
                                    title="Debe contener exactamente 10 dígitos"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,10);">
                            </div>

                            <div class="mb-3">
                                <label for="passwordInput" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="passwordInput" name="password" required>
                            </div>

                            <div class="mb-3">
                                <label for="passwordConfirmInput" class="form-label">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="passwordConfirmInput"
                                    name="password_confirmation" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100">Crear Usuario</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

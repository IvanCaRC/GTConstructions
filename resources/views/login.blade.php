<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Bootstrap CSS (Bootstrap 5) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Bundle with Popper (incluye Bootstrap JS necesario para el cierre de las alertas) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLh2rB2LmSAC5XFCLi/Nuw5H24NPb9PJA4VsmfuB6gzZ1nwFgOYnsrIOMTk3KHEt" crossorigin="anonymous">

</head>

<body class="bg-gradient-primary">
    <main class="container align-center p-5">
        <form method="POST" action="{{ route('inicia-sesion') }}">
            @csrf
            <div class="container py-5 h-100">
                <!-- Mostrar mensajes de éxito -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Mostrar mensajes de error -->
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block" style="padding: 0;">
                                    <img src="https://lirp.cdn-website.com/4df09214/dms3rep/multi/opt/4206639_e254c7b0-8401-4ee9-83e2-003e2314f846-1920w.jpg"
                                        alt="login form" class="img-fluid"
                                        style="border-radius: 1rem 0 0 1rem; width: 100%; height: 100%; object-fit: cover;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <img src="https://dewey.tailorbrands.com/production/brand_version_mockup_image/54/8174331054_85cb5a4b-6933-4113-b236-501cd8e54b5a.png"
                                                alt="login form" class="img-fluid"
                                                style="border-radius: 1rem 0 0 1rem; width: 100%; height: 100%; object-fit: cover;" />
                                        </div>
                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Inicia sesion con
                                            tu cuenta</h5>
                                        <div class="form-outline mb-4">
                                            <input type="email" placeholder="ejemplo@gmail.com" name="email"
                                                value="{{ old('email') }}" id="form2Example17"
                                                class="form-control @error('email') is-invalid @enderror" required />
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label class="form-label" for="form2Example17">Correo Electronico</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            @error('password')
                                                <span>{{ $message }}</span>
                                            @enderror
                                            <input type="password" placeholder="*****" name="password"
                                                value= "{{ old('password') }}" id="form2Example27"
                                                class="form-control @error('password') is-invalid @enderror" required />
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label class="form-label" for="form2Example27">Contraseña</label>
                                        </div>
                                        <div class="pt-1 mb-4">
                                            <button data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                                        </div>
                                        <a class="small text-muted" href="forgetPassword">¿Olvidaste tu contraseña?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
</body>

</html>

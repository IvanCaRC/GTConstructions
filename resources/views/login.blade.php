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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <main class="container align-center p-5">
        <form method="POST" action="{{ route('inicia-sesion') }}">
            @csrf
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block" style="padding: 0;">
                                    <img src="https://lirp.cdn-website.com/4df09214/dms3rep/multi/opt/4206639_e254c7b0-8401-4ee9-83e2-003e2314f846-1920w.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; width: 100%; height: 100%; object-fit: cover;" />
                                </div>
                                
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">GTConstructions</span>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="email" name="email" id="form2Example17" class="form-control form-control-lg" required />
                                            <label class="form-label" for="form2Example17">Correo Electronico</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" name="password" id="form2Example27" class="form-control form-control-lg" required />
                                            <label class="form-label" for="form2Example27">Contraseña</label>
                                        </div>
                                        <div class="pt-1 mb-4">
                                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="submit">Ingresar</button>
                                        </div>
                                        <a class="small text-muted" href="#!">Olvidaste tu contraseña?</a>
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

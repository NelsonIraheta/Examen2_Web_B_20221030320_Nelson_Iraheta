<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Iniciar sesión - AGROVALLE Honduras</title>
    <link href="{{ asset('sb-admin/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-success">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header bg-dark text-white text-center py-4">
                                <img src="{{ asset('img/logo-agrovalle.png') }}" alt="AGROVALLE" style="max-height: 70px;" class="mb-2">
                                <h4 class="font-weight-light my-1">AGROVALLE Honduras</h4>
                                <small>Plataforma de Gestión Interna</small>
                            </div>
                            <div class="card-body p-4">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                <form action="{{ route('login.post') }}" method="POST" novalidate>
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                                               class="form-control @error('email') is-invalid @enderror"
                                               placeholder="usuario@agrovalle.hn" autofocus>
                                        <label for="email"><i class="bi bi-envelope me-1"></i>Correo institucional</label>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="password" name="password" id="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               placeholder="Contraseña">
                                        <label for="password"><i class="bi bi-lock me-1"></i>Contraseña</label>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                        <label class="form-check-label" for="remember">Recordar mi sesión</label>
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-success py-2">
                                            <i class="bi bi-box-arrow-in-right me-1"></i>Ingresar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
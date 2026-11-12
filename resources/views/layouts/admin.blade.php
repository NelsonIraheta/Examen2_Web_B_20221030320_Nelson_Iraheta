<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('titulo', 'Panel') - AGROVALLE Honduras</title>
    <link href="{{ asset('sb-admin/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="sb-nav-fixed">

    <!-- BARRA SUPERIOR -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-success">
        <a class="navbar-brand ps-3" href="{{ route('dashboard') }}">AGROVALLE</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-white" id="sidebarToggle" type="button">
            <i class="bi bi-list fs-5"></i>
        </button>
        <ul class="navbar-nav ms-auto me-3 align-items-center flex-row">
            <li class="nav-item text-white me-3">
                <i class="bi bi-person-circle me-1"></i>
                <span class="fw-bold">{{ Auth::user()->name }}</span>
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">
                        <i class="bi bi-box-arrow-right me-1"></i>Cerrar sesión
                    </button>
                </form>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <!-- MENÚ LATERAL -->
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="text-center py-3">
                            <img src="{{ asset('img/logo-agrovalle.png') }}" alt="AGROVALLE Honduras" style="max-width: 150px;">
                        </div>

                        <div class="sb-sidenav-menu-heading">Principal</div>
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-speedometer2"></i></div>
                            Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">Módulos</div>
                        <a class="nav-link {{ request()->routeIs('insumos.*') ? 'active' : '' }}" href="{{ route('insumos.index') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-box-seam"></i></div>
                            Insumos
                        </a>
                        <a class="nav-link {{ request()->routeIs('proveedores.*') ? 'active' : '' }}" href="{{ route('proveedores.index') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-truck"></i></div>
                            Proveedores
                        </a>
                        <a class="nav-link {{ request()->routeIs('empleados.*') ? 'active' : '' }}" href="{{ route('empleados.index') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-people"></i></div>
                            Empleados
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Conectado como:</div>
                    {{ Auth::user()->name }}
                </div>
            </nav>
        </div>

        <!-- CONTENEDOR DE INYECCIÓN -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 mt-4">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                        </div>
                    @endif

                    @yield('contenido')
                </div>
            </main>

            <!-- PIE DE PÁGINA -->
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small text-muted">
                        <div>&copy; {{ date('Y') }} Distribuidora Agropecuaria del Valle S. de R.L. - AGROVALLE Honduras</div>
                        <div>Comayagua | San Pedro Sula</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('sb-admin/js/scripts.js') }}"></script>
    @stack('scripts')
</body>
</html>
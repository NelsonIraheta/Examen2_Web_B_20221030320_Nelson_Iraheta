@extends('layouts.admin')
@section('titulo', 'Dashboard')

@section('contenido')
<h1 class="h3 mb-1">Dashboard Gerencial</h1>
<p class="text-muted">Indicadores clave de AGROVALLE Honduras</p>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-success text-white h-100 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="small">Insumos en catálogo</div>
                    <div class="display-6 fw-bold">{{ $totalInsumos }}</div>
                </div>
                <i class="bi bi-box-seam fs-1"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-primary text-white h-100 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="small">Proveedores activos</div>
                    <div class="display-6 fw-bold">{{ $proveedoresActivos }}</div>
                </div>
                <i class="bi bi-truck fs-1"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-warning text-dark h-100 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="small">Empleados en nómina</div>
                    <div class="display-6 fw-bold">{{ $totalEmpleados }}</div>
                </div>
                <i class="bi bi-people fs-1"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-dark text-white h-100 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="small">Valor del inventario</div>
                    <div class="h3 fw-bold mb-0">L. {{ number_format($valorInventario, 2) }}</div>
                </div>
                <i class="bi bi-cash-coin fs-1"></i>
            </div>
        </div>
    </div>
</div>
@endsection
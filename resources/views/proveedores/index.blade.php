@extends('layouts.admin')
@section('titulo', 'Proveedores')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h1 class="h3 mb-0">Fabricantes y Proveedores Agrícolas</h1>
        <small class="text-muted">Red de proveedores AGROVALLE</small>
    </div>
    <a href="{{ route('proveedores.create') }}" class="btn btn-success">
        <i class="bi bi-plus-lg me-1"></i>Nuevo Proveedor
    </a>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>RTN</th>
                        <th>Empresa</th>
                        <th>Contacto</th>
                        <th>Teléfono</th>
                        <th>Categoría</th>
                        <th class="text-end">Límite de crédito</th>
                        <th class="text-center">Plazo</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($proveedores as $proveedor)
                    <tr>
                        <td>{{ $proveedor->rtn }}</td>
                        <td class="fw-bold">{{ $proveedor->empresa }}</td>
                        <td>{{ $proveedor->contacto }}</td>
                        <td>{{ $proveedor->telefono }}</td>
                        <td>{{ $proveedor->categoria }}</td>
                        <td class="text-end">L. {{ number_format($proveedor->limite_credito, 2) }}</td>
                        <td class="text-center">
                            <span class="badge bg-info text-dark">{{ $proveedor->dias_credito }} días</span>
                        </td>
                        <td class="text-center">
                            @if($proveedor->estado === 'Activo')
                                <span class="badge bg-success">Activo</span>
                            @else
                                <span class="badge bg-secondary">Inactivo</span>
                            @endif
                        </td>
                        <td class="text-center text-nowrap">
                            <a href="{{ route('proveedores.edit', $proveedor) }}" class="btn btn-warning btn-sm" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('¿Confirma que desea eliminar este proveedor?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted py-4">No hay proveedores registrados.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end mt-3">{{ $proveedores->links() }}</div>
    </div>
</div>
@endsection
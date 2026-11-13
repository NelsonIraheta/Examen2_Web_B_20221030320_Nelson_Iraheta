@extends('layouts.admin')
@section('titulo', 'Catálogo de Insumos')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
    <div>
        <h1 class="h3 mb-0">Catálogo e Inventario de Insumos</h1>
        <small class="text-muted">Insumos agropecuarios AGROVALLE</small>
    </div>
    <a href="{{ route('insumos.create') }}" class="btn btn-success">
        <i class="bi bi-plus-lg me-1"></i>Nuevo Insumo
    </a>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-header">
        <form action="{{ route('insumos.index') }}" method="GET" class="row g-2">
            <div class="col-md-6">
                <input type="text" name="buscar" value="{{ $buscar }}" class="form-control"
                       placeholder="Buscar por nombre o SKU">
            </div>
            <div class="col-auto">
                <button class="btn btn-dark"><i class="bi bi-search me-1"></i>Buscar</button>
                @if($buscar !== '')
                    <a href="{{ route('insumos.index') }}" class="btn btn-outline-secondary">Limpiar</a>
                @endif
            </div>
        </form>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Foto</th>
                        <th>SKU</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th class="text-end">Precio</th>
                        <th class="text-center">Existencias</th>
                        <th>Vence</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($insumos as $insumo)
                    <tr>
                        <td class="text-center">
                            @if($insumo->imagen)
                                <img src="{{ asset($insumo->imagen) }}" alt="{{ $insumo->nombre }}"
                                     width="48" height="48" class="rounded" style="object-fit: cover;">
                            @else
                                <i class="bi bi-image text-muted fs-3"></i>
                            @endif
                        </td>
                        <td class="fw-bold">{{ $insumo->codigo }}</td>
                        <td>
                            {{ $insumo->nombre }}
                            <div class="small text-muted">{{ $insumo->fabricante }} | Lote {{ $insumo->numero_lote }}</div>
                        </td>
                        <td>{{ $insumo->categoria }}</td>
                        <td class="text-end">L. {{ number_format($insumo->precio, 2) }}</td>
                        <td class="text-center">
                            @if($insumo->inventario > 20)
                                <span class="badge bg-success">{{ $insumo->inventario }} - Óptimo</span>
                            @elseif($insumo->inventario >= 10)
                                <span class="badge bg-warning text-dark">{{ $insumo->inventario }} - Moderado</span>
                            @else
                                <span class="badge bg-danger">{{ $insumo->inventario }} - ¡Desabastecimiento!</span>
                            @endif
                        </td>
                        <td>{{ $insumo->fecha_vencimiento?->format('d/m/Y') ?? 'N/A' }}</td>
                        <td class="text-center text-nowrap">
                            <a href="{{ route('insumos.edit', $insumo) }}" class="btn btn-warning btn-sm" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('insumos.destroy', $insumo) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('¿Confirma que desea eliminar este insumo?')">
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
                        <td colspan="8" class="text-center text-muted py-4">No se encontraron insumos.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-3">
            {{ $insumos->links() }}
        </div>
    </div>
</div>
@endsection
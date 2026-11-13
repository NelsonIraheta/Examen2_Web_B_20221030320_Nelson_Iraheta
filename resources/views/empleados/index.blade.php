@extends('layouts.admin')
@section('titulo', 'Empleados')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h1 class="h3 mb-0">Nómina y Personal Técnico</h1>
        <small class="text-muted">Plantilla de colaboradores AGROVALLE</small>
    </div>
    <a href="{{ route('empleados.create') }}" class="btn btn-success">
        <i class="bi bi-plus-lg me-1"></i>Nuevo Empleado
    </a>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Identidad</th>
                        <th>Colaborador</th>
                        <th>Correo</th>
                        <th>Cargo</th>
                        <th class="text-end">Salario mensual</th>
                        <th>Ingreso</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->identidad }}</td>
                        <td class="fw-bold">{{ $empleado->nombre }} {{ $empleado->apellido }}</td>
                        <td>{{ $empleado->correo }}</td>
                        <td>
                            <span class="badge bg-{{ \App\Models\Empleado::CARGOS[$empleado->cargo] ?? 'secondary' }}">
                                {{ $empleado->cargo }}
                            </span>
                        </td>
                        <td class="text-end">L. {{ number_format($empleado->salario, 2) }}</td>
                        <td>{{ $empleado->fecha_ingreso->format('d/m/Y') }}</td>
                        <td class="text-center">
                            <span class="badge {{ $empleado->estado === 'Activo' ? 'bg-success' : 'bg-secondary' }}">
                                {{ $empleado->estado }}
                            </span>
                        </td>
                        <td class="text-center text-nowrap">
                            <a href="{{ route('empleados.edit', $empleado) }}" class="btn btn-warning btn-sm" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('empleados.destroy', $empleado) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('¿Confirma que desea eliminar a este empleado?')">
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
                        <td colspan="8" class="text-center text-muted py-4">No hay empleados registrados.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end mt-3">{{ $empleados->links() }}</div>
    </div>
</div>
@endsection
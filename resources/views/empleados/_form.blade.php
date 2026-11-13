<div class="row g-3">
    <div class="col-md-4">
        <x-campo name="identidad" label="Identidad (13 dígitos, sin guiones)" maxlength="13" inputmode="numeric" :value="$empleado?->identidad" />
    </div>
    <div class="col-md-4">
        <x-campo name="nombre" label="Nombre" :value="$empleado?->nombre" />
    </div>
    <div class="col-md-4">
        <x-campo name="apellido" label="Apellido" :value="$empleado?->apellido" />
    </div>

    <div class="col-md-6">
        <x-campo name="correo" label="Correo electrónico" type="email" :value="$empleado?->correo" />
    </div>
    <div class="col-md-6">
        <x-selector name="cargo" label="Cargo" :opciones="array_keys(\App\Models\Empleado::CARGOS)" :value="$empleado?->cargo" />
    </div>

    <div class="col-md-4">
        <x-campo name="salario" label="Salario base mensual (L.)" type="number" step="0.01" min="0" :value="$empleado?->salario" />
    </div>
    <div class="col-md-4">
        <x-campo name="fecha_ingreso" label="Fecha de ingreso" type="date" :value="$empleado?->fecha_ingreso?->format('Y-m-d')" />
    </div>
    <div class="col-md-4">
        <x-selector name="estado" label="Estado" :opciones="\App\Models\Empleado::ESTADOS" :value="$empleado?->estado ?? 'Activo'" />
    </div>
</div>

<hr class="my-4">
<div class="d-flex justify-content-end gap-2">
    <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-success"><i class="bi bi-save me-1"></i>Guardar</button>
</div>
<div class="row g-3">
    <div class="col-md-4">
        <x-campo name="rtn" label="RTN (14 dígitos)" maxlength="14" inputmode="numeric" :value="$proveedor?->rtn" />
    </div>
    <div class="col-md-8">
        <x-campo name="empresa" label="Empresa (razón social)" :value="$proveedor?->empresa" />
    </div>

    <div class="col-md-6">
        <x-campo name="contacto" label="Asesor comercial" :value="$proveedor?->contacto" />
    </div>
    <div class="col-md-6">
        <x-campo name="telefono" label="Teléfono (8 dígitos)" maxlength="8" inputmode="numeric" :value="$proveedor?->telefono" />
    </div>

    <div class="col-md-4">
        <x-selector name="categoria" label="Categoría" :opciones="\App\Models\Proveedor::CATEGORIAS" :value="$proveedor?->categoria" />
    </div>
    <div class="col-md-4">
        <x-campo name="limite_credito" label="Límite de crédito (L.)" type="number" step="0.01" min="0" :value="$proveedor?->limite_credito" />
    </div>
    <div class="col-md-4">
        <x-selector name="dias_credito" label="Días de crédito" :opciones="\App\Models\Proveedor::DIAS_CREDITO" :value="$proveedor?->dias_credito" />
    </div>

    <div class="col-md-6">
        <x-selector name="estado" label="Estado" :opciones="\App\Models\Proveedor::ESTADOS" :value="$proveedor?->estado ?? 'Activo'" />
    </div>
    <div class="col-md-6">
        <x-campo name="fecha_registro" label="Fecha de registro" type="date"
                 :value="$proveedor?->fecha_registro?->format('Y-m-d') ?? now()->format('Y-m-d')" />
    </div>
</div>

<hr class="my-4">
<div class="d-flex justify-content-end gap-2">
    <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-success"><i class="bi bi-save me-1"></i>Guardar</button>
</div>
<div class="row g-3">
    <div class="col-md-4">
        <x-campo name="codigo" label="Código (SKU)" :value="$insumo?->codigo" />
    </div>
    <div class="col-md-8">
        <x-campo name="nombre" label="Nombre del insumo" :value="$insumo?->nombre" />
    </div>

    <div class="col-md-6">
        <x-selector name="categoria" label="Categoría" :opciones="\App\Models\Insumo::CATEGORIAS" :value="$insumo?->categoria" />
    </div>
    <div class="col-md-6">
        <x-campo name="fabricante" label="Fabricante" :value="$insumo?->fabricante" />
    </div>

    <div class="col-md-4">
        <x-campo name="precio" label="Precio (L.)" type="number" step="0.01" min="0" :value="$insumo?->precio" />
    </div>
    <div class="col-md-4">
        <x-campo name="costo" label="Costo (L.)" type="number" step="0.01" min="0" :value="$insumo?->costo" />
    </div>
    <div class="col-md-4">
        <x-campo name="inventario" label="Inventario (unidades)" type="number" min="0" :value="$insumo?->inventario" />
    </div>

    <div class="col-md-4">
        <x-campo name="numero_lote" label="Número de lote" :value="$insumo?->numero_lote" />
    </div>
    <div class="col-md-4">
        <x-campo name="fecha_registro" label="Fecha de registro" type="date"
                 :value="$insumo?->fecha_registro?->format('Y-m-d') ?? now()->format('Y-m-d')" />
    </div>
    <div class="col-md-4">
        <x-campo name="fecha_vencimiento" label="Fecha de vencimiento" type="date" :required="false"
                 :value="$insumo?->fecha_vencimiento?->format('Y-m-d')" />
    </div>

    <div class="col-12">
        <label class="form-label fw-bold" for="imagen">Fotografía del empaque (jpg, png o webp, máx. 5 MB)</label>
        <input type="file" id="imagen" name="imagen" accept=".jpg,.jpeg,.png,.webp"
               class="form-control @error('imagen') is-invalid @enderror">
        @error('imagen')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        @if($insumo?->imagen)
            <div class="mt-2">
                <img src="{{ asset($insumo->imagen) }}" alt="Imagen actual" height="80" class="rounded border">
                <small class="text-muted ms-2">Imagen actual (sube otra para reemplazarla)</small>
            </div>
        @endif
    </div>
</div>

<hr class="my-4">
<div class="d-flex justify-content-end gap-2">
    <a href="{{ route('insumos.index') }}" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-success"><i class="bi bi-save me-1"></i>Guardar</button>
</div>
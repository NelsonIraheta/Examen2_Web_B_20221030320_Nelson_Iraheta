@extends('layouts.admin')
@section('titulo', 'Editar Insumo')

@section('contenido')
<h1 class="h3 mb-3">Editar Insumo: {{ $insumo->nombre }}</h1>
<div class="card shadow-sm col-lg-10">
    <div class="card-body p-4">
        <form action="{{ route('insumos.update', $insumo) }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT')
            @include('insumos._form', ['insumo' => $insumo])
        </form>
    </div>
</div>
@endsection
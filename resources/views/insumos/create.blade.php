@extends('layouts.admin')
@section('titulo', 'Nuevo Insumo')

@section('contenido')
<h1 class="h3 mb-3">Registrar Insumo</h1>
<div class="card shadow-sm col-lg-10">
    <div class="card-body p-4">
        <form action="{{ route('insumos.store') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            @include('insumos._form', ['insumo' => null])
        </form>
    </div>
</div>
@endsection
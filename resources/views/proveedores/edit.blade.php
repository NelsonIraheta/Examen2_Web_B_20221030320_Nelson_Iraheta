@extends('layouts.admin')
@section('titulo', 'Nuevo Proveedor')

@section('contenido')
<h1 class="h3 mb-3">Registrar Proveedor</h1>
<div class="card shadow-sm col-lg-10">
    <div class="card-body p-4">
        <form action="{{ route('proveedores.store') }}" method="POST" novalidate>
            @csrf
            @include('proveedores._form', ['proveedor' => null])
        </form>
    </div>
</div>
@endsection
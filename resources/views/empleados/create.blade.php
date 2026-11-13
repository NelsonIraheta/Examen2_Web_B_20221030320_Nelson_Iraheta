@extends('layouts.admin')
@section('titulo', 'Nuevo Empleado')

@section('contenido')
<h1 class="h3 mb-3">Registrar Empleado</h1>
<div class="card shadow-sm col-lg-10">
    <div class="card-body p-4">
        <form action="{{ route('empleados.store') }}" method="POST" novalidate>
            @csrf
            @include('empleados._form', ['empleado' => null])
        </form>
    </div>
</div>
@endsection
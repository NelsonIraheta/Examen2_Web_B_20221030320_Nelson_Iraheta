@extends('layouts.admin')
@section('titulo', 'Editar Empleado')

@section('contenido')
<h1 class="h3 mb-3">Editar Empleado: {{ $empleado->nombre }} {{ $empleado->apellido }}</h1>
<div class="card shadow-sm col-lg-10">
    <div class="card-body p-4">
        <form action="{{ route('empleados.update', $empleado) }}" method="POST" novalidate>
            @csrf
            @method('PUT')
            @include('empleados._form', ['empleado' => $empleado])
        </form>
    </div>
</div>
@endsection
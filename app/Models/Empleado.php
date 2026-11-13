<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    public const CARGOS = [
        'Ingeniero Agrónomo' => 'success',
        'Asesor Técnico de Campo' => 'primary',
        'Jefe de Bodega Central' => 'warning text-dark',
        'Operador de Maquinaria' => 'info text-dark',
        'Cajero' => 'secondary',
    ];

    public const ESTADOS = ['Activo', 'Inactivo'];

    protected $fillable = [
        'identidad', 'nombre', 'apellido', 'correo', 'cargo',
        'salario', 'fecha_ingreso', 'estado',
    ];

    protected $casts = [
        'fecha_ingreso' => 'date',
    ];
}

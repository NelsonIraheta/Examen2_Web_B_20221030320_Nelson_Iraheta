<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';

    public const CATEGORIAS = ['Químicos', 'Semilleros', 'Maquinaria'];
    public const DIAS_CREDITO = [15 => '15 días', 30 => '30 días', 45 => '45 días', 60 => '60 días'];
    public const ESTADOS = ['Activo', 'Inactivo'];

    protected $fillable = [
        'rtn', 'empresa', 'contacto', 'telefono', 'categoria',
        'limite_credito', 'dias_credito', 'estado', 'fecha_registro',
    ];

    protected $casts = [
        'fecha_registro' => 'date',
    ];
}

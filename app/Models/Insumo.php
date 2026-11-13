<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    public const CATEGORIAS = [
        'Fertilizantes',
        'Semillas Certificadas',
        'Agroquímicos',
        'Herramientas',
        'Sistemas de Riego',
    ];

    protected $fillable = [
        'codigo', 'nombre', 'categoria', 'precio', 'costo', 'inventario',
        'imagen', 'fabricante', 'fecha_vencimiento', 'fecha_registro', 'numero_lote',
    ];

    protected $casts = [
        'fecha_vencimiento' => 'date',
        'fecha_registro' => 'date',
    ];
}

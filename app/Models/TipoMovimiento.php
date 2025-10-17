<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMovimiento extends Model
{
    use HasFactory;

    protected $table = 'tipos_movimiento';

    protected $fillable = [
        'nombre',
        'descripcion',
        'afecta_stock',
        'signo',
        'activo'
    ];

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = null;
}

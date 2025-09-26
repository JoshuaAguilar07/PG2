<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoInsumo extends Model
{
    protected $table = 'estados_insumo';

    protected $fillable = [
        'nombre',
        'descripcion',
        'activo',
    ];

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = null; // 👈 tampoco hay updated_at

    public $timestamps = true;
}

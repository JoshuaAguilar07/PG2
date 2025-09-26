<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    protected $table = 'unidades_medida';

    protected $fillable = [
        'nombre',
        'abreviatura',
        'activa',
    ];

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = null; // 👈 No tienes campo de modificación

    public $timestamps = true;
}

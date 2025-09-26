<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    protected $fillable = ['nombre', 'descripcion', 'activo'];

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = null; // 👈 Si no tienes columna para updated_at
}

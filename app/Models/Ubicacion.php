<?php
// app/Models/Ubicacion.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $table = 'ubicaciones';

    protected $fillable = [
        'nombre',
        'descripcion',
        'temperatura',
        'capacidad',
        'activa',
    ];

    public $timestamps = false; // Usamos fecha_creacion
}

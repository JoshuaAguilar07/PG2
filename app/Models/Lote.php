<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'lotes';

    protected $fillable = [
        'insumo_id',
        'numero_lote',
        'fecha_ingreso',
        'fecha_caducidad',
        'cantidad_inicial',
        'cantidad_actual',
        'ubicacion_id',
        'estado',
        'observaciones',
    ];

    protected $casts = [
        'fecha_ingreso' => 'date',
        'fecha_caducidad' => 'date',
    ];

    /**
     * Relación con el modelo Insumo
     */
    public function insumo()
    {
        return $this->belongsTo(Insumo::class, 'insumo_id');
    }

    /**
     * Relación con el modelo Ubicacion
     */
    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class, 'ubicacion_id');
    }

    /**
     * Scope para filtrar lotes por estado
     */
    public function scopeActivo($query)
    {
        return $query->where('estado', 'disponible');
    }

    /**
     * Scope para lotes próximos a caducar (por ejemplo, dentro de 30 días)
     */
    public function scopeProximosACaducar($query, $dias = 30)
    {
        return $query->whereBetween('fecha_caducidad', [
            now(),
            now()->addDays($dias)
        ]);
    }
}

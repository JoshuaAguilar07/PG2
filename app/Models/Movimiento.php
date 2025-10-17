<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;

    protected $table = 'movimientos';

    protected $fillable = [
        'tipo_movimiento_id',
        'insumo_id',
        'lote_id',
        'cantidad',
        'usuario_id',
        'ubicacion_id',
        'motivo',
        'proyecto',
        'solicitante',
        'observaciones'
    ];

    const CREATED_AT = 'fecha_movimiento';
    const UPDATED_AT = null;

    // Relaciones
    public function tipo()       { return $this->belongsTo(TipoMovimiento::class, 'tipo_movimiento_id'); }
    public function insumo()     { return $this->belongsTo(Insumo::class, 'insumo_id'); }
    public function lote()       { return $this->belongsTo(Lote::class, 'lote_id'); }
    public function usuario()    { return $this->belongsTo(Usuario::class, 'usuario_id'); }
    public function ubicacion()  { return $this->belongsTo(Ubicacion::class, 'ubicacion_id'); }
}

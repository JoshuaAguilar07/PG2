<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;

    protected $table = 'insumos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'codigo_barras',
        'categoria_id',
        'proveedor_id',
        'unidad_medida_id',
        'estado_id',
        'stock_minimo',
        'stock_maximo',
        'temperatura_almacenamiento',
        'lote_requerido',
        'caducidad_requerida',
        'activo'
    ];

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_actualizacion';

    // Relaciones
    public function categoria()   { return $this->belongsTo(Categoria::class, 'categoria_id'); }
    public function proveedor()   { return $this->belongsTo(Proveedor::class, 'proveedor_id'); }
    public function unidad()      { return $this->belongsTo(UnidadMedida::class, 'unidad_medida_id'); }
    public function estado()      { return $this->belongsTo(EstadoInsumo::class, 'estado_id'); }
    public function lotes()       { return $this->hasMany(Lote::class, 'insumo_id'); }
}

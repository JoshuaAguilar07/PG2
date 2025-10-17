<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Models\Insumo;
use App\Models\Lote;
use App\Models\TipoMovimiento;
use App\Models\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MovimientoController extends Controller
{
    public function index()
    {
        $movimientos = Movimiento::with(['tipo', 'insumo', 'usuario', 'ubicacion'])
            ->orderBy('fecha_movimiento', 'desc')
            ->paginate(10);

        return view('movimientos.index', compact('movimientos'));
    }

    public function create()
    {
        $tipos = TipoMovimiento::where('activo', 1)->get();
        $insumos = Insumo::where('activo', 1)->get();
        $lotes = Lote::all();
        $ubicaciones = Ubicacion::where('activa', 1)->get();

        return view('movimientos.create', compact('tipos', 'insumos', 'lotes', 'ubicaciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_movimiento_id' => 'required|exists:tipos_movimiento,id',
            'insumo_id' => 'required|exists:insumos,id',
            'cantidad' => 'required|integer|min:1',
            'ubicacion_id' => 'required|exists:ubicaciones,id',
        ]);

        DB::transaction(function () use ($request) {
            $tipo = TipoMovimiento::find($request->tipo_movimiento_id);
            $insumo = Insumo::find($request->insumo_id);

            // Crear movimiento
            $movimiento = Movimiento::create([
                'tipo_movimiento_id' => $tipo->id,
                'insumo_id' => $insumo->id,
                'lote_id' => $request->lote_id,
                'cantidad' => $request->cantidad,
                'usuario_id' => Auth::id(),
                'ubicacion_id' => $request->ubicacion_id,
                'motivo' => $request->motivo,
                'proyecto' => $request->proyecto,
                'solicitante' => $request->solicitante,
                'observaciones' => $request->observaciones,
            ]);

            // Actualizar stock del insumo
            if ($tipo->afecta_stock && $tipo->signo != 0) {
                $nuevoStock = $insumo->stock_minimo + ($request->cantidad * $tipo->signo);
                $insumo->stock_minimo = max(0, $nuevoStock);
                $insumo->save();
            }

            // Si tiene lote, actualizar el stock del lote
            if ($request->lote_id) {
                $lote = Lote::find($request->lote_id);
                if ($lote) {
                    $nuevo = $lote->cantidad_actual + ($request->cantidad * $tipo->signo);
                    $lote->cantidad_actual = max(0, $nuevo);
                    $lote->save();
                }
            }
        });

        return redirect()->route('movimientos.index')->with('success', 'Movimiento registrado correctamente.');
    }



    public function historial(Request $request)
    {
        $insumos = \App\Models\Insumo::all();

        $query = Movimiento::with(['tipo', 'insumo', 'usuario', 'ubicacion'])
            ->orderBy('fecha_movimiento', 'desc');

        if ($request->filled('insumo_id')) {
            $query->where('insumo_id', $request->insumo_id);
        }
        if ($request->filled('desde')) {
            $query->whereDate('fecha_movimiento', '>=', $request->desde);
        }
        if ($request->filled('hasta')) {
            $query->whereDate('fecha_movimiento', '<=', $request->hasta);
        }

        $movimientos = $query->paginate(20);

        return view('movimientos.historial', compact('movimientos', 'insumos'));
    }



}

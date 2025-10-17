<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use App\Models\Insumo;
use App\Models\Ubicacion;
use Illuminate\Http\Request;

class LoteController extends Controller
{
    public function index()
    {
        $lotes = Lote::with(['insumo', 'ubicacion'])
            ->orderBy('fecha_ingreso', 'desc')
            ->paginate(10);

        return view('lotes.index', compact('lotes'));
    }

    public function create()
    {
        $insumos = Insumo::where('activo', 1)->get();
        $ubicaciones = Ubicacion::where('activa', 1)->get();

        return view('lotes.create', compact('insumos', 'ubicaciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'insumo_id' => 'required|exists:insumos,id',
            'numero_lote' => 'required|string|max:100|unique:lotes,numero_lote,NULL,id,insumo_id,' . $request->insumo_id,
            'fecha_ingreso' => 'required|date',
            'fecha_caducidad' => 'nullable|date|after_or_equal:fecha_ingreso',
            'cantidad_inicial' => 'required|integer|min:1',
            'cantidad_actual' => 'required|integer|min:0',
            'ubicacion_id' => 'required|exists:ubicaciones,id',
            'estado' => 'required|string|max:50',
        ]);

        Lote::create($request->all());

        return redirect()->route('lotes.index')->with('success', 'Lote registrado correctamente.');
    }

    public function edit(Lote $lote)
    {
        $insumos = Insumo::where('activo', 1)->get();
        $ubicaciones = Ubicacion::where('activa', 1)->get();

        return view('lotes.edit', compact('lote', 'insumos', 'ubicaciones'));
    }

    public function update(Request $request, Lote $lote)
    {
        $request->validate([
            'insumo_id' => 'required|exists:insumos,id',
            'numero_lote' => 'required|string|max:100|unique:lotes,numero_lote,' . $lote->id . ',id,insumo_id,' . $request->insumo_id,
            'fecha_ingreso' => 'required|date',
            'fecha_caducidad' => 'nullable|date|after_or_equal:fecha_ingreso',
            'cantidad_inicial' => 'required|integer|min:1',
            'cantidad_actual' => 'required|integer|min:0',
            'ubicacion_id' => 'required|exists:ubicaciones,id',
            'estado' => 'required|string|max:50',
        ]);

        $lote->update($request->all());

        return redirect()->route('lotes.index')->with('success', 'Lote actualizado correctamente.');
    }

    public function destroy(Lote $lote)
    {
        $lote->delete();
        return redirect()->route('lotes.index')->with('success', 'Lote eliminado correctamente.');
    }
}

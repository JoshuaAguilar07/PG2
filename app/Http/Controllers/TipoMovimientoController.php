<?php

namespace App\Http\Controllers;

use App\Models\TipoMovimiento;
use Illuminate\Http\Request;

class TipoMovimientoController extends Controller
{
    public function index()
    {
        $tipos = TipoMovimiento::orderBy('id')->paginate(10);
        return view('tipos_movimiento.index', compact('tipos'));
    }

    public function create()
    {
        return view('tipos_movimiento.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50|unique:tipos_movimiento,nombre',
            'signo' => 'required|integer|in:-1,0,1',
        ]);

        TipoMovimiento::create($request->all());
        return redirect()->route('tipos_movimiento.index')->with('success', 'Tipo de movimiento creado correctamente.');
    }

    public function edit(TipoMovimiento $tipoMovimiento)
    {
        return view('tipos_movimiento.edit', compact('tipoMovimiento'));
    }

    public function update(Request $request, TipoMovimiento $tipoMovimiento)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'signo' => 'required|integer|in:-1,0,1',
        ]);

        $tipoMovimiento->update($request->all());
        return redirect()->route('tipos_movimiento.index')->with('success', 'Tipo de movimiento actualizado correctamente.');
    }

    public function destroy(TipoMovimiento $tipoMovimiento)
    {
        $tipoMovimiento->delete();
        return redirect()->route('tipos_movimiento.index')->with('success', 'Tipo de movimiento eliminado correctamente.');
    }
}

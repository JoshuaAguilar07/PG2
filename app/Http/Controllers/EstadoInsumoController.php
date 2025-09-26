<?php

namespace App\Http\Controllers;

use App\Models\EstadoInsumo;
use Illuminate\Http\Request;

class EstadoInsumoController extends Controller
{
    public function index()
    {
        $estados = EstadoInsumo::paginate(10);
        return view('estados.index', compact('estados'));
    }

    public function create()
    {
        return view('estados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50|unique:estados_insumo,nombre',
            'descripcion' => 'nullable|string',
        ]);

        EstadoInsumo::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('estados.index')->with('success', 'Estado de insumo creado correctamente.');
    }

    public function edit(EstadoInsumo $estado)
    {
        return view('estados.edit', compact('estado'));
    }

    public function update(Request $request, EstadoInsumo $estado)
    {
        $request->validate([
            'nombre' => 'required|string|max:50|unique:estados_insumo,nombre,' . $estado->id,
            'descripcion' => 'nullable|string',
        ]);

        $estado->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('estados.index')->with('success', 'Estado de insumo actualizado correctamente.');
    }

    public function destroy(EstadoInsumo $estado)
    {
        $estado->delete();
        return redirect()->route('estados.index')->with('success', 'Estado de insumo eliminado correctamente.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\UnidadMedida;
use Illuminate\Http\Request;

class UnidadMedidaController extends Controller
{
    public function index()
    {
        $unidades = UnidadMedida::paginate(10);
        return view('unidades.index', compact('unidades'));
    }

    public function create()
    {
        return view('unidades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50|unique:unidades_medida,nombre',
            'abreviatura' => 'required|string|max:20',
        ]);

        UnidadMedida::create([
            'nombre' => $request->nombre,
            'abreviatura' => $request->abreviatura,
            'activa' => $request->has('activa'),
        ]);

        return redirect()->route('unidades.index')->with('success', 'Unidad de medida creada correctamente.');
    }

    public function edit(UnidadMedida $unidad)
    {
        return view('unidades.edit', compact('unidad'));
    }

    public function update(Request $request, UnidadMedida $unidad)
    {
        $request->validate([
            'nombre' => 'required|string|max:50|unique:unidades_medida,nombre,' . $unidad->id,
            'abreviatura' => 'required|string|max:20',
        ]);

        $unidad->update([
            'nombre' => $request->nombre,
            'abreviatura' => $request->abreviatura,
            'activa' => $request->has('activa'),
        ]);

        return redirect()->route('unidades.index')->with('success', 'Unidad de medida actualizada correctamente.');
    }

    public function destroy(UnidadMedida $unidad)
    {
        $unidad->delete();
        return redirect()->route('unidades.index')->with('success', 'Unidad de medida eliminada correctamente.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use App\Models\Categoria;
use App\Models\Proveedor;
use App\Models\UnidadMedida;
use App\Models\EstadoInsumo;
use Illuminate\Http\Request;

class InsumoController extends Controller
{
    public function index()
    {
        $insumos = Insumo::with(['categoria', 'proveedor', 'unidad', 'estado'])
            ->orderBy('nombre', 'asc')
            ->paginate(10);

        return view('insumos.index', compact('insumos'));
    }

    public function create()
    {
        $categorias = Categoria::where('activa', 1)->get();
        $proveedores = Proveedor::where('activo', 1)->get();
        $unidades = UnidadMedida::where('activa', 1)->get();
        $estados = EstadoInsumo::where('activo', 1)->get();

        return view('insumos.create', compact('categorias', 'proveedores', 'unidades', 'estados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:200',
            'categoria_id' => 'required|exists:categorias,id',
            'unidad_medida_id' => 'required|exists:unidades_medida,id',
            'estado_id' => 'required|exists:estados_insumo,id',
            'stock_minimo' => 'nullable|integer|min:0',
            'stock_maximo' => 'nullable|integer|min:0',
        ]);

        Insumo::create($request->all());

        return redirect()->route('insumos.index')->with('success', 'Insumo creado correctamente.');
    }

    public function edit(Insumo $insumo)
    {
        $categorias = Categoria::where('activa', 1)->get();
        $proveedores = Proveedor::where('activo', 1)->get();
        $unidades = UnidadMedida::where('activa', 1)->get();
        $estados = EstadoInsumo::where('activo', 1)->get();

        return view('insumos.edit', compact('insumo', 'categorias', 'proveedores', 'unidades', 'estados'));
    }

    public function update(Request $request, Insumo $insumo)
    {
        $request->validate([
            'nombre' => 'required|string|max:200',
            'categoria_id' => 'required|exists:categorias,id',
            'unidad_medida_id' => 'required|exists:unidades_medida,id',
            'estado_id' => 'required|exists:estados_insumo,id',
            'stock_minimo' => 'nullable|integer|min:0',
            'stock_maximo' => 'nullable|integer|min:0',
        ]);

        $insumo->update($request->all());

        return redirect()->route('insumos.index')->with('success', 'Insumo actualizado correctamente.');
    }

    public function destroy(Insumo $insumo)
    {
        $insumo->delete();

        return redirect()->route('insumos.index')->with('success', 'Insumo eliminado correctamente.');
    }
}

<?php
// app/Http/Controllers/UbicacionController.php
namespace App\Http\Controllers;

use App\Models\Ubicacion;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    public function index()
    {
        $ubicaciones = Ubicacion::paginate(10);
        return view('ubicaciones.index', compact('ubicaciones'));
    }

    public function create()
    {
        return view('ubicaciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'temperatura' => 'nullable|string|max:50',
            'capacidad' => 'nullable|integer',
        ]);

        Ubicacion::create($request->all());

        return redirect()->route('ubicaciones.index')->with('success', 'Ubicación creada correctamente');
    }

    public function edit(Ubicacion $ubicacion)
    {
        return view('ubicaciones.edit', compact('ubicacion'));
    }

    public function update(Request $request, Ubicacion $ubicacion)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'temperatura' => 'nullable|string|max:50',
            'capacidad' => 'nullable|integer',
        ]);

        $ubicacion->update($request->all());

        return redirect()->route('ubicaciones.index')->with('success', 'Ubicación actualizada correctamente');
    }

    public function destroy(Ubicacion $ubicacion)
    {
        $ubicacion->delete();
        return redirect()->route('ubicaciones.index')->with('success', 'Ubicación eliminada correctamente');
    }
}

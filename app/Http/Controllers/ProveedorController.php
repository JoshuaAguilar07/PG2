<?php
// app/Http/Controllers/ProveedorController.php
namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::paginate(10);
        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:200',
            'contacto' => 'nullable|string|max:150',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:150',
            'direccion' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['activo'] = $request->has('activo') ? 1 : 0; // <-- Convierte a 1 o 0

        Proveedor::create($data);

        return redirect()->route('proveedores.index')->with('success', 'Proveedor creado correctamente');
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'nombre' => 'required|string|max:200',
            'contacto' => 'nullable|string|max:150',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:150',
            'direccion' => 'nullable|string',
        ]);

    $data = $request->all();
    $data['activo'] = $request->has('activo') ? 1 : 0; // <-- Convierte a 1 o 0

    $proveedor->update($data);

    return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado correctamente');
}
    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }


    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado correctamente');
    }
}

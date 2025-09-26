<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        $roles = Rol::paginate(10);
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50|unique:roles,nombre',
            'descripcion' => 'nullable|string',
            'activo' => 'boolean'
        ]);

        Rol::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('roles.index')->with('success', 'Rol creado correctamente');
    }

    public function edit(Rol $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Rol $role)
    {
        $request->validate([
            'nombre' => 'required|string|max:50|unique:roles,nombre,' . $role->id,
            'descripcion' => 'nullable|string',
            'activo' => 'boolean'
        ]);

        $role->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('roles.index')->with('success', 'Rol actualizado correctamente');
    }

    public function destroy(Rol $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Rol eliminado correctamente');
    }
}

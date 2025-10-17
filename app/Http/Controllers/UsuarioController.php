<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::where('activo', true)->with('rol')->paginate(10);
        $user_session = auth()->user();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Formulario de creación
     */
    public function create()
    {
        $roles = Rol::all();
        return view('usuarios.create', compact('roles'));
    }

    /**
     * Guardar nuevo usuario
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|unique:usuarios,email',
            'username' => 'required|string|max:50|unique:usuarios,username',
            'password' => 'required|string|min:6',
            'rol_id' => 'required|exists:roles,id',
        ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'username' => $request->username,
            'password_hash' => Hash::make($request->password), // 👈 bcrypt
            'rol_id' => $request->rol_id,
            'activo' => $request->has('activo'),
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente');
    }


    /**
     * Mostrar un usuario
     */
    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Formulario de edición
     */
    public function edit(Usuario $usuario)
    {
        $roles = Rol::all();
        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    /**
     * Actualizar usuario
     */
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|unique:usuarios,email,' . $usuario->id,
            'username' => 'required|string|max:50|unique:usuarios,username,' . $usuario->id,
            'rol_id' => 'required|exists:roles,id',
            'photo' => 'nullable|image|max:2048', // 👈 valida la imagen (2MB máx)
        ]);

        $data = [
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'username' => $request->username,
            'rol_id' => $request->rol_id,
            'activo' => $request->has('activo'),
        ];

        if ($request->filled('password')) {
            $data['password_hash'] = Hash::make($request->password);
        }

        // 🔹 Guardar imagen si se sube una nueva
        if ($request->hasFile('photo')) {
            $data['photo'] = base64_encode(file_get_contents($request->file('photo')->getRealPath()));
        }

        $usuario->update($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente');
    }

    /**
     * Eliminar usuario
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->update(['activo' => false]);
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente');
    }



}

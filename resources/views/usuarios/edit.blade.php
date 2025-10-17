@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg m-10 max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Editar Usuario</h1>

    <form method="POST" action="{{ route('usuarios.update', $usuario) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Nombre -->
        <div>
            <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ $usuario->nombre }}" required
                class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Apellido -->
        <div>
            <label for="apellido" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Apellido</label>
            <input type="text" name="apellido" id="apellido" value="{{ $usuario->apellido }}" required
                class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
            <input type="email" name="email" id="email" value="{{ $usuario->email }}" required
                class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Username -->
        <div>
            <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Usuario</label>
            <input type="text" name="username" id="username" value="{{ $usuario->username }}" required
                class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Rol -->
        <div>
            <label for="rol_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rol</label>
            <select name="rol_id" id="rol_id"
                class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                @foreach ($roles as $rol)
                    <option value="{{ $rol->id }}" {{ $usuario->rol_id == $rol->id ? 'selected' : '' }}>
                        {{ ucfirst($rol->nombre) }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Foto de perfil -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Foto de Perfil</label>
            @if ($usuario->photo)
                <div class="my-2">
                    <img src="data:image/jpeg;base64,{{ $usuario->photo }}"
                         alt="Foto de usuario"
                         class="w-24 h-24 rounded-full object-cover border border-gray-400 dark:border-gray-600">
                </div>
            @endif
            <input type="file" name="photo" accept="image/*"
                   class="mt-1 block w-full text-sm text-gray-700 dark:text-gray-200
                          file:mr-4 file:py-2 file:px-4
                          file:rounded-md file:border-0
                          file:text-sm file:font-semibold
                          file:bg-blue-600 file:text-white
                          hover:file:bg-blue-700">
        </div>

        <!-- Activo -->
        <div class="flex items-center">
            <input type="checkbox" name="activo" id="activo" value="1" {{ $usuario->activo ? 'checked' : '' }}
                class="h-4 w-4 text-blue-600 border-gray-300 rounded">
            <label for="activo" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">Activo</label>
        </div>

        <!-- Botones -->
        <div class="flex justify-end gap-3">
            <a href="{{ route('usuarios.index') }}"
                class="px-4 py-2 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300">
                Cancelar
            </a>
            <button type="submit"
                class="px-4 py-2 rounded-lg bg-gradient-to-r from-blue-500 to-blue-700 text-white font-semibold shadow hover:opacity-90">
                Actualizar
            </button>
        </div>
    </form>
</div>
@endsection

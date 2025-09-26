@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg m-10 max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Detalle de Usuario</h1>

    <div class="space-y-4 text-gray-700 dark:text-gray-300">
        <p><strong>Nombre:</strong> {{ $usuario->nombre }}</p>
        <p><strong>Apellido:</strong> {{ $usuario->apellido }}</p>
        <p><strong>Email:</strong> {{ $usuario->email }}</p>
        <p><strong>Usuario:</strong> {{ $usuario->username }}</p>
        <p><strong>Rol:</strong> {{ $usuario->rol->nombre ?? 'Sin rol' }}</p>
        <p><strong>Activo:</strong> {{ $usuario->activo ? 'Sí' : 'No' }}</p>
        <p><strong>Fecha creación:</strong> {{ $usuario->fecha_creacion }}</p>
    </div>

    <div class="mt-6 flex justify-end gap-3">
        <a href="{{ route('usuarios.index') }}"
           class="px-4 py-2 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300">
            Volver
        </a>
        <a href="{{ route('usuarios.edit', $usuario) }}"
           class="px-4 py-2 rounded-lg bg-yellow-400 text-yellow-900 font-semibold hover:bg-yellow-500">
            Editar
        </a>
    </div>
</div>
@endsection

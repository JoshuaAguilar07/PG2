@extends('layouts.app')

@section('content')
<div class="flex justify-center py-10">
    <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">
            Perfil de Usuario
        </h1>

        <div class="space-y-4">
            {{-- photo --}}
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Foto de perfil</p>
                @if ($user->photo)
                    <img src="data:image/jpeg;base64,{{ $user->photo }}"
                         alt="Foto de usuario"
                         class="w-24 h-24 rounded-full object-cover border border-gray-400 dark:border-gray-600  mt-2">
                @else
                    <p class="text-lg font-semibold text-gray-800 dark:text-gray-100 mt-2">
                        No hay foto de perfil.
                    </p>
                @endif
            </div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Nombre completo</p>
                <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                    {{ $user->nombre }} {{ $user->apellido }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Correo electrónico</p>
                <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                    {{ $user->email }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Usuario</p>
                <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                    {{ $user->username }}
                </p>
            </div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Rol</p>
                <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                    {{ $user->rol['nombre'] }}
                </p>
            </div>



        </div>

        <div class="mt-6 flex justify-end">
            <a href="{{ route('usuarios.edit', $user->id) }}"
               class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Editar Perfil
            </a>
        </div>
    </div>
</div>
@endsection

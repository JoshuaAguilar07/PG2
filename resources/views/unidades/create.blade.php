@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg mt-10">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Nueva Unidad de Medida</h1>

    <form action="{{ route('unidades.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Nombre -->
        <div>
            <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                   class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            @error('nombre')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Abreviatura -->
        <div>
            <label for="abreviatura" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Abreviatura</label>
            <input type="text" name="abreviatura" id="abreviatura" value="{{ old('abreviatura') }}"
                   class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            @error('abreviatura')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Activa -->
        <div class="flex items-center">
            <input type="checkbox" name="activa" id="activa" value="1" {{ old('activa', true) ? 'checked' : '' }}
                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
            <label for="activa" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">Activo</label>
        </div>

        <!-- Botones -->
        <div class="flex justify-end gap-3">
            <a href="{{ route('unidades.index') }}"
               class="px-4 py-2 rounded-lg bg-gray-500 text-white hover:bg-gray-600 transition">
                Cancelar
            </a>
            <button type="submit"
                    class="px-4 py-2 rounded-lg bg-gradient-to-r from-blue-500 to-blue-700 text-white hover:opacity-90 transition">
                Guardar
            </button>
        </div>
    </form>
</div>
@endsection

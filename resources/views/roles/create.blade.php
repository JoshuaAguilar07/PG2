
@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center mt-10">
    <div class="w-full max-w-lg bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Nuevo Rol</h1>

        <form action="{{ route('roles.store') }}" method="POST">
            @csrf

            <!-- Nombre -->
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                <input type="text" name="nombre" id="nombre"
                       class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-900 dark:text-gray-100"
                       value="{{ old('nombre') }}" required>
                @error('nombre')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Descripción -->
            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="3"
                          class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-900 dark:text-gray-100">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Activo -->
            <div class="flex items-center mb-6">
                <input type="checkbox" name="activo" id="activo" value="1"
                       class="h-4 w-4 text-blue-600 border-gray-300 rounded"
                       {{ old('activo', true) ? 'checked' : '' }}>
                <label for="activo" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">
                    Activo
                </label>
            </div>

            <!-- Botones -->
            <div class="flex justify-end gap-3">
                <a href="{{ route('roles.index') }}"
                   class="px-4 py-2 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600 transition">
                    Cancelar
                </a>
                <button type="submit"
                        class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-lg shadow hover:opacity-90 transition">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

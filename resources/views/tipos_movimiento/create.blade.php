@extends('layouts.app')

@section('content')
<div class="flex justify-center py-10">
    <div class="w-full max-w-lg bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Nuevo Tipo de Movimiento</h1>

        <form action="{{ route('tipos_movimiento.store') }}" method="POST">
            @csrf

            <!-- Nombre -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" required
                       class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @error('nombre') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Descripción -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción</label>
                <textarea name="descripcion" rows="3"
                          class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('descripcion') }}</textarea>
            </div>

            <!-- Signo -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Signo</label>
                <select name="signo" class="mt-1 w-full rounded-lg dark:bg-gray-700 dark:text-white border-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    <option value="1">Entrada (+1)</option>
                    <option value="-1">Salida (-1)</option>
                    <option value="0">Neutro (0)</option>
                </select>
            </div>

            <!-- Afecta Stock -->
            <div class="mb-4 flex items-center gap-2">
                <input type="checkbox" name="afecta_stock" value="1" checked class="rounded text-blue-600">
                <label class="text-sm text-gray-700 dark:text-gray-300">Afecta Stock</label>
            </div>

            <!-- Activo -->
            <div class="mb-6 flex items-center gap-2">
                <input type="checkbox" name="activo" value="1" checked class="rounded text-blue-600">
                <label class="text-sm text-gray-700 dark:text-gray-300">Activo</label>
            </div>

            <!-- Botones -->
            <div class="flex justify-end gap-3">
                <a href="{{ route('tipos_movimiento.index') }}" class="px-4 py-2 bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-400 dark:hover:bg-gray-500">Cancelar</a>
                <button type="submit" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-lg shadow hover:opacity-90">Guardar</button>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="flex justify-center py-10">
    <div class="w-full max-w-3xl bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Editar Insumo</h1>

        <form action="{{ route('insumos.update', $insumo) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}"
                                                 class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                @error('nombre') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Descripción -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción</label>
                <textarea name="descripcion" rows="3"
                    class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('descripcion') }}</textarea>
            </div>

            <!-- Código de barras -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Código de Barras</label>
                <input type="text" name="codigo_barras" value="{{ old('codigo_barras') }}"
                    class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Categoría y Unidad -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categoría</label>
                    <select name="categoria_id"
                        class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <option value="">Seleccione una categoría</option>
                        @foreach($categorias as $cat)
                            <option value="{{ $cat->id }}" {{ old('categoria_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Unidad de Medida</label>
                    <select name="unidad_medida_id"
                        class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <option value="">Seleccione una unidad</option>
                        @foreach($unidades as $u)
                            <option value="{{ $u->id }}" {{ old('unidad_medida_id') == $u->id ? 'selected' : '' }}>
                                {{ $u->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Proveedor y Estado -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Proveedor</label>
                    <select name="proveedor_id"
                        class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="">Seleccione un proveedor</option>
                        @foreach($proveedores as $p)
                            <option value="{{ $p->id }}" {{ old('proveedor_id') == $p->id ? 'selected' : '' }}>
                                {{ $p->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estado del Insumo</label>
                    <select name="estado_id"
                        class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                        <option value="">Seleccione un estado</option>
                        @foreach($estados as $e)
                            <option value="{{ $e->id }}" {{ old('estado_id') == $e->id ? 'selected' : '' }}>
                                {{ $e->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Stock mínimo/máximo -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Stock Mínimo</label>
                    <input type="number" name="stock_minimo" value="{{ old('stock_minimo', 0) }}"
                        class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Stock Máximo</label>
                    <input type="number" name="stock_maximo" value="{{ old('stock_maximo', 0) }}"
                        class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
            </div>

            <!-- Temperatura -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Temperatura de Almacenamiento</label>
                <input type="text" name="temperatura_almacenamiento" value="{{ old('temperatura_almacenamiento') }}"
                    class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Checkboxes -->
            <div class="flex gap-6 mb-6">
                <label class="flex items-center text-sm text-gray-700 dark:text-gray-300">
                    <input type="checkbox" name="lote_requerido" value="1" class="rounded text-blue-600" checked>
                    <span class="ml-2">Lote Requerido</span>
                </label>
                <label class="flex items-center text-sm text-gray-700 dark:text-gray-300">
                    <input type="checkbox" name="caducidad_requerida" value="1" class="rounded text-blue-600" checked>
                    <span class="ml-2">Caducidad Requerida</span>
                </label>
                <label class="flex items-center text-sm text-gray-700 dark:text-gray-300">
                    <input type="checkbox" name="activo" value="1" class="rounded text-blue-600" checked>
                    <span class="ml-2">Activo</span>
                </label>
            </div>

            <!-- Botones -->
            <div class="flex justify-end gap-3">
                <a href="{{ route('insumos.index') }}"
                    class="px-4 py-2 bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-400 dark:hover:bg-gray-500">Cancelar</a>
                <button type="submit"
                    class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-lg shadow hover:opacity-90">Guardar</button>
            </div>
        </form>
    </div>
</div>
@endsection

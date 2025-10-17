@extends('layouts.app')

@section('content')
<div class="flex justify-center py-10">
    <div class="w-full max-w-3xl bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Nuevo Lote</h1>

        <form action="{{ route('lotes.store') }}" method="POST">
            @csrf

            <!-- Insumo -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Insumo</label>
                <select name="insumo_id" required class="w-full rounded-lg dark:bg-gray-700 dark:text-white border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Seleccione...</option>
                    @foreach($insumos as $i)
                        <option value="{{ $i->id }}">{{ $i->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Número de lote -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Número de Lote</label>
                <input type="text" name="numero_lote" value="{{ old('numero_lote') }}"
                       class="w-full rounded-lg dark:bg-gray-700 dark:text-white border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Fechas -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha de Ingreso</label>
                    <input type="date" name="fecha_ingreso" value="{{ old('fecha_ingreso') }}" required
                           class="w-full rounded-lg dark:bg-gray-700 dark:text-white border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha de Caducidad</label>
                    <input type="date" name="fecha_caducidad" value="{{ old('fecha_caducidad') }}"
                           class="w-full rounded-lg dark:bg-gray-700 dark:text-white border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <!-- Cantidades -->
            <div class="grid grid-cols-2 gap-4 mt-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cantidad Inicial</label>
                    <input type="number" name="cantidad_inicial" value="{{ old('cantidad_inicial') }}" min="1" required
                           class="w-full rounded-lg dark:bg-gray-700 dark:text-white border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cantidad Actual</label>
                    <input type="number" name="cantidad_actual" value="{{ old('cantidad_actual') }}" min="0" required
                           class="w-full rounded-lg dark:bg-gray-700 dark:text-white border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <!-- Ubicación -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ubicación</label>
                <select name="ubicacion_id" required class="w-full rounded-lg dark:bg-gray-700 dark:text-white border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Seleccione...</option>
                    @foreach($ubicaciones as $u)
                        <option value="{{ $u->id }}">{{ $u->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Estado -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estado</label>
                <select name="estado" class="w-full rounded-lg dark:bg-gray-700 dark:text-white border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                    <option value="disponible">Disponible</option>
                    <option value="reservado">Reservado</option>
                    <option value="vencido">Vencido</option>
                    <option value="agotado">Agotado</option>
                </select>
            </div>

            <!-- Observaciones -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Observaciones</label>
                <textarea name="observaciones" rows="3" class="w-full rounded-lg dark:bg-gray-700 dark:text-white border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>

            <!-- Botones -->
            <div class="flex justify-end gap-3 mt-6">
                <a href="{{ route('lotes.index') }}" class="px-4 py-2 bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-400 dark:hover:bg-gray-500">Cancelar</a>
                <button type="submit" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-lg shadow hover:opacity-90">Guardar</button>
            </div>
        </form>
    </div>
</div>
@endsection

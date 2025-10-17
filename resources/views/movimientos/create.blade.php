@extends('layouts.app')

@section('content')
<div class="flex justify-center py-10">
    <div class="w-full max-w-3xl bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Registrar Movimiento</h1>

        <form action="{{ route('movimientos.store') }}" method="POST">
            @csrf

            <!-- Tipo de movimiento -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipo de Movimiento</label>
                <select name="tipo_movimiento_id" class="mt-1 w-full rounded-lg dark:bg-gray-700 dark:text-white border-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    <option value="">Seleccione...</option>
                    @foreach($tipos as $t)
                        <option value="{{ $t->id }}">{{ $t->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Insumo -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Insumo</label>
                <select name="insumo_id" class="mt-1 w-full rounded-lg dark:bg-gray-700 dark:text-white border-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    <option value="">Seleccione un insumo</option>
                    @foreach($insumos as $i)
                        <option value="{{ $i->id }}">{{ $i->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Lote -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Lote (opcional)</label>
                <select name="lote_id" class="mt-1 w-full rounded-lg dark:bg-gray-700 dark:text-white border-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="">Sin lote</option>
                    @foreach($lotes as $l)
                        <option value="{{ $l->id }}">{{ $l->numero_lote }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Cantidad -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cantidad</label>
                <input type="number" name="cantidad" min="1" value="1"
                    class="mt-1 w-full rounded-lg dark:bg-gray-700 dark:text-white border-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
            </div>

            <!-- Ubicación -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ubicación</label>
                <select name="ubicacion_id" class="mt-1 w-full rounded-lg dark:bg-gray-700 dark:text-white border-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    <option value="">Seleccione una ubicación</option>
                    @foreach($ubicaciones as $u)
                        <option value="{{ $u->id }}">{{ $u->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Motivo, proyecto, solicitante -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Motivo</label>
                    <input type="text" name="motivo" class="mt-1 w-full rounded-lg dark:bg-gray-700 dark:text-white border-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Proyecto</label>
                    <input type="text" name="proyecto" class="mt-1 w-full rounded-lg dark:bg-gray-700 dark:text-white border-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
            </div>

            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Solicitante</label>
                <input type="text" name="solicitante" class="mt-1 w-full rounded-lg dark:bg-gray-700 dark:text-white border-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Observaciones -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Observaciones</label>
                <textarea name="observaciones" rows="3"
                    class="mt-1 w-full rounded-lg dark:bg-gray-700 dark:text-white border-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
            </div>

            <!-- Botones -->
            <div class="flex justify-end gap-3 mt-6">
                <a href="{{ route('movimientos.index') }}" class="px-4 py-2 bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-400 dark:hover:bg-gray-500">Cancelar</a>
                <button type="submit" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-lg shadow hover:opacity-90">Guardar</button>
            </div>
        </form>
    </div>
</div>
@endsection

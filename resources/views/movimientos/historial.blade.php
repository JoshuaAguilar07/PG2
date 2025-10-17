@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg m-10">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-6">Historial de Movimientos (Kardex)</h1>

    <!-- Filtros -->
    <form method="GET" action="{{ route('movimientos.historial') }}" class="flex flex-wrap gap-4 mb-6">
        <div>
            <label class="block text-sm text-gray-700 dark:text-gray-300">Insumo</label>
            <select name="insumo_id" class="rounded-lg dark:bg-gray-700 dark:text-white border-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <option value="">Todos</option>
                @foreach($insumos as $i)
                    <option value="{{ $i->id }}" {{ request('insumo_id') == $i->id ? 'selected' : '' }}>
                        {{ $i->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm text-gray-700 dark:text-gray-300">Desde</label>
            <input type="date" name="desde" value="{{ request('desde') }}" class="rounded-lg dark:bg-gray-700 dark:text-white border-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>

        <div>
            <label class="block text-sm text-gray-700 dark:text-gray-300">Hasta</label>
            <input type="date" name="hasta" value="{{ request('hasta') }}" class="rounded-lg dark:bg-gray-700 dark:text-white border-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>

        <div class="flex items-end">
            <button type="submit"
                class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-5 py-2 rounded-lg shadow hover:opacity-90">
                <i class="fas fa-search mr-1"></i> Filtrar
            </button>
        </div>
    </form>

    <div class="flex justify-end mb-4">
        <a href="{{ route('movimientos.pdf', request()->query()) }}"
           class="bg-gradient-to-r from-red-500 to-red-700 text-white px-5 py-2 rounded-lg shadow hover:opacity-90"
           target="_blank">
           <i class="fas fa-file-pdf mr-2"></i> Exportar a PDF
        </a>
    </div>

    <!-- Tabla -->
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left border dark:border-gray-700 rounded-lg">
            <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                <tr>
                    <th class="px-4 py-3">Fecha</th>
                    <th class="px-4 py-3">Tipo</th>
                    <th class="px-4 py-3">Insumo</th>
                    <th class="px-4 py-3">Cantidad</th>
                    <th class="px-4 py-3">Usuario</th>
                    <th class="px-4 py-3">Ubicación</th>
                    <th class="px-4 py-3">Motivo</th>
                </tr>
            </thead>
            <tbody class="divide-y dark:divide-gray-700">
                @forelse($movimientos as $m)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    <td class="px-4 py-2 text-white">{{ $m->fecha_movimiento }}</td>
                    <td class="px-4 py-2 text-white">{{ $m->tipo->nombre }}</td>
                    <td class="px-4 py-2 text-white">{{ $m->insumo->nombre }}</td>
                    <td class="px-4 py-2 font-semibold {{ $m->tipo->signo == 1 ? 'text-green-600' : 'text-red-500' }}">
                        {{ $m->tipo->signo == 1 ? '+' : '-' }}{{ $m->cantidad }}
                    </td>
                    <td class="px-4 py-2 text-white">{{ $m->usuario->nombre ?? 'N/A' }}</td>
                    <td class="px-4 py-2 text-white">{{ $m->ubicacion->nombre ?? '-' }}</td>
                    <td class="px-4 py-2 text-white">{{ $m->motivo ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-4 text-gray-500">No se encontraron movimientos</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $movimientos->links() }}</div>
</div>
@endsection

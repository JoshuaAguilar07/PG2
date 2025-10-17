@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg m-10">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Movimientos de Inventario</h1>
        <a href="{{ route('movimientos.create') }}"
           class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-5 py-2 rounded-xl shadow hover:opacity-90">
           <i class="fas fa-plus mr-1"></i> Nuevo Movimiento
        </a>
    </div>

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
                    <th class="px-4 py-3">Proyecto</th>
                </tr>
            </thead>
            <tbody class="divide-y dark:divide-gray-700">
                @forelse($movimientos as $mov)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    <td class="px-4 py-2 text-white">{{ $mov->fecha_movimiento }}</td>
                    <td class="px-4 py-2 text-white">{{ $mov->tipo->nombre }}</td>
                    <td class="px-4 py-2 text-white">{{ $mov->insumo->nombre }}</td>
                    <td class="px-4 py-2 text-white">{{ $mov->cantidad }}</td>
                    <td class="px-4 py-2 text-white">{{ $mov->usuario->nombre ?? 'N/A' }}</td>
                    <td class="px-4 py-2 text-white">{{ $mov->ubicacion->nombre }}</td>
                    <td class="px-4 py-2 text-white">{{ $mov->proyecto ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-4 text-gray-500">No hay movimientos registrados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $movimientos->links() }}</div>
</div>
@endsection

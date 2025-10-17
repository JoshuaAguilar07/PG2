@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg m-10">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Insumos</h1>
        <a href="{{ route('insumos.create') }}"
           class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-5 py-2 rounded-xl shadow hover:opacity-90">
           <i class="fas fa-plus mr-1"></i> Nuevo Insumo
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left border dark:border-gray-700 rounded-lg">
            <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                <tr>
                    <th class="px-4 py-3">Nombre</th>
                    <th class="px-4 py-3">Categoría</th>
                    <th class="px-4 py-3">Unidad</th>
                    <th class="px-4 py-3">Proveedor</th>
                    <th class="px-4 py-3">Estado</th>
                    <th class="px-4 py-3">Stock Min</th>
                    <th class="px-4 py-3">Stock Max</th>
                    <th class="px-4 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y dark:divide-gray-700">
                @forelse($insumos as $insumo)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    <td class="px-4 py-2 text-white">{{ $insumo->nombre }}</td>
                    <td class="px-4 py-2 text-white">{{ $insumo->categoria->nombre ?? '-' }}</td>
                    <td class="px-4 py-2 text-white">{{ $insumo->unidad->nombre ?? '-' }}</td>
                    <td class="px-4 py-2 text-white">{{ $insumo->proveedor->nombre ?? '-' }}</td>
                    <td class="px-4 py-2 text-white">{{ $insumo->estado->nombre ?? '-' }}</td>
                    <td class="px-4 py-2 text-white">{{ $insumo->stock_minimo }}</td>
                    <td class="px-4 py-2 text-white">{{ $insumo->stock_maximo }}</td>
                    <td class="px-4 py-2 text-center flex gap-2 justify-center">
                        <a href="{{ route('insumos.edit', $insumo) }}"
                           class="bg-yellow-400 text-yellow-900 px-3 py-1 rounded-lg text-xs font-semibold hover:bg-yellow-500 transition">
                           Editar
                        </a>
                        <form action="{{ route('insumos.destroy', $insumo) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este insumo?')">
                            @csrf @method('DELETE')
                            <button class="bg-red-600 text-white px-3 py-1 rounded-lg text-xs font-semibold hover:bg-red-700">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="text-center py-4 text-gray-500">No hay insumos registrados</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-6">{{ $insumos->links() }}</div>
</div>
@endsection

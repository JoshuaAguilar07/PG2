@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg m-10">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Lotes de Insumos</h1>
        <a href="{{ route('lotes.create') }}"
           class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-5 py-2 rounded-xl shadow hover:opacity-90 transition">
            <i class="fas fa-plus mr-1"></i> Nuevo Lote
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left border dark:border-gray-700 rounded-lg">
            <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                <tr>
                    <th class="px-4 py-3">Insumo</th>
                    <th class="px-4 py-3">Lote</th>
                    <th class="px-4 py-3">Ingreso</th>
                    <th class="px-4 py-3">Caducidad</th>
                    <th class="px-4 py-3">Stock</th>
                    <th class="px-4 py-3">Ubicación</th>
                    <th class="px-4 py-3">Estado</th>
                    <th class="px-4 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y dark:divide-gray-700">
                @forelse ($lotes as $lote)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <td class="px-4 py-2 text-white">{{ $lote->insumo->nombre }}</td>
                        <td class="px-4 py-2 text-white">{{ $lote->numero_lote }}</td>
                        <td class="px-4 py-2 text-white">{{ $lote->fecha_ingreso->format('d/m/Y') }}</td>
                        <td class="px-4 py-2 text-white">{{ $lote->fecha_caducidad ? $lote->fecha_caducidad->format('d/m/Y') : '-' }}</td>
                        <td class="px-4 py-2 text-white">{{ $lote->cantidad_actual }} / {{ $lote->cantidad_inicial }}</td>
                        <td class="px-4 py-2 text-white">{{ $lote->ubicacion->nombre }}</td>
                        <td class="px-4 py-2 text-white">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full
                                {{ $lote->estado === 'disponible' ? 'bg-green-200 text-green-800' :
                                   ($lote->estado === 'vencido' ? 'bg-red-200 text-red-800' : 'bg-yellow-200 text-yellow-800') }}">
                                {{ ucfirst($lote->estado) }}
                            </span>
                        </td>
                        <td class="px-4 py-2 flex justify-center gap-2">
                            <a href="{{ route('lotes.edit', $lote) }}"
                               class="bg-yellow-400 text-yellow-900 px-3 py-1 rounded-lg text-xs font-semibold hover:bg-yellow-500 transition">
                                Editar
                            </a>
                            <form action="{{ route('lotes.destroy', $lote) }}" method="POST" onsubmit="return confirm('¿Eliminar este lote?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-600 text-white px-3 py-1 rounded-lg text-xs font-semibold hover:bg-red-700 transition">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-4 py-2 text-center text-gray-500 dark:text-gray-400">
                            No hay lotes registrados
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $lotes->links() }}</div>
</div>
@endsection

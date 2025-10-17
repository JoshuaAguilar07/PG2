@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg m-10">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Tipos de Movimiento</h1>
        <a href="{{ route('tipos_movimiento.create') }}"
           class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-5 py-2 rounded-xl shadow hover:opacity-90">
           <i class="fas fa-plus mr-1"></i> Nuevo Tipo
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left border dark:border-gray-700 rounded-lg">
            <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                <tr>
                    <th class="px-4 py-3">Nombre</th>
                    <th class="px-4 py-3">Descripción</th>
                    <th class="px-4 py-3">Signo</th>
                    <th class="px-4 py-3">Afecta Stock</th>
                    <th class="px-4 py-3">Activo</th>
                    <th class="px-4 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y dark:divide-gray-700">
                @forelse($tipos as $tipo)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    <td class="px-4 py-2 text-white font-semibold">{{ $tipo->nombre }}</td>
                    <td class="px-4 py-2 text-white">{{ $tipo->descripcion ?? '-' }}</td>
                    <td class="px-4 py-2 text-white">{{ $tipo->signo }}</td>
                    <td class="px-4 py-2 text-white">{{ $tipo->afecta_stock ? 'Sí' : 'No' }}</td>
                    <td class="px-4 py-2 text-white">{{ $tipo->activo ? 'Sí' : 'No' }}</td>
                    <td class="px-4 py-2 flex justify-center gap-2">
                        <a href="{{ route('tipos_movimiento.edit', $tipo) }}"
                           class="bg-yellow-400 text-yellow-900 px-3 py-1 rounded-lg text-xs font-semibold hover:bg-yellow-500">Editar</a>
                        <form action="{{ route('tipos_movimiento.destroy', $tipo) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este tipo?')">
                            @csrf @method('DELETE')
                            <button class="bg-red-600 text-white px-3 py-1 rounded-lg text-xs font-semibold hover:bg-red-700">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center py-4 text-gray-500">No hay tipos de movimiento registrados</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $tipos->links() }}</div>
</div>
@endsection

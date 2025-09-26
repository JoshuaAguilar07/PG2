@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg m-10">
    <!-- Encabezado -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Categorías</h1>
        <a href="{{ route('categorias.create') }}"
           class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-5 py-2 rounded-xl shadow hover:opacity-90 transition">
            + Nueva Categoría
        </a>
    </div>

    <!-- Tabla -->
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
            <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-xs uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-3">Nombre</th>
                    <th class="px-6 py-3">Descripción</th>
                    <th class="px-6 py-3">Activa</th>
                    <th class="px-6 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse ($categorias as $categoria)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray-100">{{ $categoria->nombre }}</td>
                        <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $categoria->descripcion ?? '—' }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full
                                {{ $categoria->activa ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                                {{ $categoria->activa ? 'Sí' : 'No' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 flex justify-center gap-2">
                            <a href="{{ route('categorias.edit', $categoria) }}"
                               class="bg-yellow-400 text-yellow-900 px-3 py-1 rounded-lg text-xs font-semibold hover:bg-yellow-500 transition">
                                Editar
                            </a>
                            <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta categoría?')" class="inline">
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
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                            No hay categorías registradas.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-6">
        {{ $categorias->links() }}
    </div>
</div>
@endsection

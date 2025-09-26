@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg m-10">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Estados de Insumo</h1>
        <a href="{{ route('estados.create') }}"
           class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-5 py-2 rounded-xl shadow hover:opacity-90 transition">
            Nuevo Estado
        </a>
    </div>

    <table class="min-w-full text-sm text-left border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-xs uppercase">
            <tr>
                <th class="px-6 py-3">Nombre</th>
                <th class="px-6 py-3">Descripción</th>
                <th class="px-6 py-3">Activo</th>
                <th class="px-6 py-3 text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($estados as $estado)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    <td class="px-6 py-4">{{ $estado->nombre }}</td>
                    <td class="px-6 py-4">{{ $estado->descripcion ?? '-' }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 text-xs font-semibold rounded-full
                            {{ $estado->activo ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                            {{ $estado->activo ? 'Sí' : 'No' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 flex justify-center gap-2">
                        <a href="{{ route('estados.edit', $estado) }}"
                           class="bg-yellow-400 text-yellow-900 px-3 py-1 rounded-lg text-xs font-semibold hover:bg-yellow-500">
                            Editar
                        </a>
                        <form action="{{ route('estados.destroy', $estado) }}" method="POST" class="inline" onsubmit="return confirm('¿Seguro que deseas eliminar este estado?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-600 text-white px-3 py-1 rounded-lg text-xs font-semibold hover:bg-red-700">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                        No hay estados registrados
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-6">
        {{ $estados->links() }}
    </div>
</div>
@endsection

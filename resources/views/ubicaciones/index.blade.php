@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg m-10">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Ubicaciones</h1>
        <a href="{{ route('ubicaciones.create') }}"
           class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-5 py-2 rounded-xl shadow hover:opacity-90 transition">
            Nueva Ubicación
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
            <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-xs uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-3">Nombre</th>
                    <th class="px-6 py-3">Descripción</th>
                    <th class="px-6 py-3">Temperatura</th>
                    <th class="px-6 py-3">Capacidad</th>
                    <th class="px-6 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse ($ubicaciones as $ubicacion)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <td class="px-6 py-4">{{ $ubicacion->nombre }}</td>
                        <td class="px-6 py-4">{{ $ubicacion->descripcion ?? '—' }}</td>
                        <td class="px-6 py-4">{{ $ubicacion->temperatura ?? '—' }}</td>
                        <td class="px-6 py-4">{{ $ubicacion->capacidad ?? '—' }}</td>
                        <td class="px-6 py-4 flex justify-center gap-2">
                            <a href="{{ route('ubicaciones.edit', $ubicacion) }}"
                               class="bg-yellow-400 text-yellow-900 px-3 py-1 rounded-lg text-xs font-semibold hover:bg-yellow-500 transition">
                                Editar
                            </a>
                            <form action="{{ route('ubicaciones.destroy', $ubicacion) }}" method="POST" onsubmit="return confirm('¿Eliminar esta ubicación?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-lg text-xs font-semibold hover:bg-red-700 transition">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">No hay ubicaciones registradas</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $ubicaciones->links() }}
    </div>
</div>
@endsection

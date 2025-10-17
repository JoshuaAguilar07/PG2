@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Título -->
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-6">
            Panel de Control
        </h1>

        <!-- Grid de seguridad (Usuarios y Roles) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            <!-- Gestión de Usuarios -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Usuarios</h2>
                    <span class="bg-blue-100 text-blue-700 text-xs font-medium px-2.5 py-0.5 rounded">Gestión</span>
                </div>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    Administra los usuarios del sistema, asigna roles y activa o desactiva accesos.
                </p>
                <div class="mt-4">
                    <a href="{{ route('usuarios.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-700 text-white text-sm font-semibold rounded-lg shadow hover:opacity-90">
                        Ver Usuarios
                    </a>
                </div>
            </div>

            <!-- Gestión de Roles -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Roles</h2>
                    <span class="bg-purple-100 text-purple-700 text-xs font-medium px-2.5 py-0.5 rounded">Seguridad</span>
                </div>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    Define y gestiona los roles del sistema para controlar el acceso de los usuarios.
                </p>
                <div class="mt-4">
                    <a href="{{ route('roles.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-500 to-purple-700 text-white text-sm font-semibold rounded-lg shadow hover:opacity-90">
                        Ver Roles
                    </a>
                </div>
            </div>
        </div>

        <!-- Grid de gestión (catálogos del sistema) -->
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-4">Gestión del Sistema</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Unidades de Medida -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Unidades de Medida</h2>
                    <span class="bg-green-100 text-green-700 text-xs font-medium px-2.5 py-0.5 rounded">Gestión</span>
                </div>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    Administra las unidades de medida para estandarizar insumos (ml, g, kit, etc.).
                </p>
                <div class="mt-4">
                    <a href="{{ route('unidades.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-green-500 to-green-700 text-white text-sm font-semibold rounded-lg shadow hover:opacity-90">
                        Ver Unidades
                    </a>
                </div>
            </div>

            <!-- Estados de Insumo -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Estados de Insumo</h2>
                    <span class="bg-red-100 text-red-700 text-xs font-medium px-2.5 py-0.5 rounded">Gestión</span>
                </div>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    Define los estados de los insumos (disponible, agotado, reservado, vencido, dañado).
                </p>
                <div class="mt-4">
                    <a href="{{ route('estados.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-red-500 to-red-700 text-white text-sm font-semibold rounded-lg shadow hover:opacity-90">
                        Ver Estados
                    </a>
                </div>
            </div>

            <!-- Categorías de Insumo -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Categorías</h2>
                    <span class="bg-yellow-100 text-yellow-700 text-xs font-medium px-2.5 py-0.5 rounded">Gestión</span>
                </div>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    Clasifica los insumos en categorías como reactivos, equipos y materiales.
                </p>
                <div class="mt-4">
                    <a href="{{ route('categorias.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-yellow-500 to-yellow-700 text-white text-sm font-semibold rounded-lg shadow hover:opacity-90">
                        Ver Categorías
                    </a>
                </div>
            </div>

            <!-- Proveedores -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Proveedores</h2>
                    <span class="bg-blue-100 text-blue-700 text-xs font-medium px-2.5 py-0.5 rounded">Gestión</span>
                </div>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    Administra los proveedores con datos de contacto y asigna insumos a ellos.
                </p>
                <div class="mt-4">
                    <a href="{{ route('proveedores.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-700 text-white text-sm font-semibold rounded-lg shadow hover:opacity-90">
                        Ver Proveedores
                    </a>
                </div>
            </div>

            <!-- Ubicaciones -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Ubicaciones</h2>
                    <span class="bg-teal-100 text-teal-700 text-xs font-medium px-2.5 py-0.5 rounded">Gestión</span>
                </div>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    Define y gestiona las ubicaciones de almacenamiento (refrigeradores, estanterías, etc.).
                </p>
                <div class="mt-4">
                    <a href="{{ route('ubicaciones.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-teal-500 to-teal-700 text-white text-sm font-semibold rounded-lg shadow hover:opacity-90">
                        Ver Ubicaciones
                    </a>
                </div>
            </div>

            <!-- Insumos -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Insumos</h2>
                    <span class="bg-indigo-100 text-indigo-700 text-xs font-medium px-2.5 py-0.5 rounded">Gestión</span>
                </div>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    Administra los insumos del sistema, incluyendo detalles como cantidad, estado y ubicación.
                </p>
                <div class="mt-4">
                    <a href="{{ route('insumos.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-indigo-300 to-indigo-500 text-white text-sm font-semibold rounded-lg shadow hover:opacity-90">
                        Ver Insumos
                    </a>
                </div>
            </div>

            <!-- Tipo de movimientos -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Tipos de Movimiento</h2>
                    <span class="bg-stone-100 text-stone-700 text-xs font-medium px-2.5 py-0.5 rounded">Gestión</span>
                </div>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    Define los tipos de movimientos de insumos (entrada, salida, transferencia, ajuste).
                </p>
                <div class="mt-4">
                    <a href="{{ route('tipos_movimiento.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-stone-300 to-stone-500 text-white text-sm font-semibold rounded-lg shadow hover:opacity-90">
                        Ver Tipos de Movimiento
                    </a>
                </div>
            </div>



            <!-- Movimientos -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Movimientos</h2>
                    <span class="bg-stone-100 text-stone-700 text-xs font-medium px-2.5 py-0.5 rounded">Gestión</span>
                </div>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    Gestiona los movimientos de inventario para rastrear entradas y salidas de insumos.
                </p>
                <div class="mt-4">
                    <a href="{{ route('movimientos.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-rose-700 to-rose-900 text-white text-sm font-semibold rounded-lg shadow hover:opacity-90">
                        Ver Movimientos
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

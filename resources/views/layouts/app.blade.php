<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Inmunolab') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @yield('styles')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset



            @if ($errors->any())
                <div class="max-w-3xl mx-auto mt-6 px-4">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow">
                        <strong>Oops!</strong> Hubo algunos problemas con tu formulario:
                        <ul class="mt-2 list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            {{-- Éxito --}}
            @if (session('success'))
                <div
                            x-data="{ show: true }"
                            x-init="setTimeout(() => show = false, 4000)"
                            x-show="show"
                            x-transition
                            class="max-w-3xl mx-auto mt-6 px-4 py-3 rounded-lg bg-green-100 border border-green-400 text-green-700 shadow"
                            >
                            {{ session('success') }}
                </div>
            @endif

            {{-- Error general --}}
            @if (session('error'))
                <div
                            x-data="{ show: true }"
                            x-init="setTimeout(() => show = false, 5000)"
                            x-show="show"
                            x-transition
                            class="max-w-3xl mx-auto mt-6 px-4 py-3 rounded-lg bg-red-100 border border-red-400 text-red-700 shadow"
                            >
                            {{ session('error') }}
                </div>
            @endif

            {{-- Errores de validación --}}
            @if ($errors->any())
                <div
                            x-data="{ show: true }"
                            x-init="setTimeout(() => show = false, 6000)"
                            x-show="show"
                            x-transition
                            class="max-w-3xl mx-auto mt-6 px-4 py-3 rounded-lg bg-red-100 border border-red-400 text-red-700 shadow"
                            >
                            <strong>Se encontraron errores:</strong>
                            <ul class="mt-2 list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                </div>
            @endif
            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
            @yield('scripts')
        </div>
    </body>
</html>

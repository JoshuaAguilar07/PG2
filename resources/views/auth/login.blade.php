<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
<div class="mt-4">
    <x-input-label for="password" :value="__('Contraseña')" />

    <div class="relative">
        <!-- Campo de texto -->
        <x-text-input id="password"
            class="block mt-1 w-full pr-10"
            type="password"
            name="password"
            required autocomplete="current-password" />

        <!-- Botón dentro del input -->
        <button type="button"
            onclick="togglePassword()"
            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 focus:outline-none">
            <p id="texto">Mostrar contraseña</p>
            <!-- Icono de ojo (Heroicon) -->
            <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" 
                class="h-5 w-5" fill="none" viewBox="0 0 24 24" 
                stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" 
                    d="M2.25 12s3.75-7.5 9.75-7.5S21.75 12 21.75 12s-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" />
                <circle cx="12" cy="12" r="3" />
            </svg>

            <!-- Icono de ojo cerrado -->
            <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3.98 8.223A10.451 10.451 0 001.5 12s3.75 7.5 10.5 7.5c2.129 0 4.077-.637 5.738-1.725M9.88 9.88a3 3 0 104.24 4.24M15 15l6 6m-6-6l-6-6" />
            </svg>
        </button>
    </div>
<br>
    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>


        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Olvidé mi contraseña') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('login') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<script>
function togglePassword() {
    const input = document.getElementById('password');
    const eyeOpen = document.getElementById('eyeOpen');
    const eyeClosed = document.getElementById('eyeClosed');
    const texto = document.getElementById("texto");

    if (input.type === 'password') {
        input.type = 'text';
        eyeOpen.classList.add('hidden');
        eyeClosed.classList.remove('hidden');
        texto.innerText = "Ocultar contraseña ";

    } else {
        input.type = 'password';
        eyeClosed.classList.add('hidden');
        eyeOpen.classList.remove('hidden');
         texto.innerText = "Mostrar contraseña ";
    }
}
</script>
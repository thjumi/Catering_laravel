<x-guest-layout>
    <div class="max-w-md mx-auto bg-[#5D4037] shadow-lg rounded-lg p-6 mt-10">
        <h2 class="text-2xl font-bold text-[#FFD700] text-center mb-4">
            {{ __('Iniciar Sesión') }}
        </h2>
        <title>CateringSoft</title>

        <!-- Mensaje de sesión -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Correo Electrónico -->
            <div class="mb-4">
                <x-input-label for="email" class="text-[#FFD700]" :value="__('Correo Electrónico')" />
                <x-text-input id="email" class="block mt-1 w-full bg-[#4E342E] border-[#FFD700] text-[#FFD700]" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
            </div>

            <!-- Contraseña -->
            <div class="mb-4">
                <x-input-label for="password" class="text-[#FFD700]" :value="__('Contraseña')" />
                <x-text-input id="password" class="block mt-1 w-full bg-[#4E342E] border-[#FFD700] text-[#FFD700]" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
            </div>

            <!-- Recordarme y Recuperar Contraseña -->
            <div class="flex items-center justify-between mb-4">
                <label for="remember_me" class="flex items-center text-sm text-[#FFD700]">
                    <input id="remember_me" type="checkbox" class="rounded border-[#FFD700] bg-[#4E342E] text-[#FFD700] focus:ring-[#FFD700]" name="remember">
                    <span class="ms-2">{{ __('Recuérdame') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-[#FFD700] hover:underline">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif
            </div>

            <!-- Botón de Inicio de Sesión -->
            <div>
                <x-primary-button class="w-full py-2 text-lg bg-[#4E342E] hover:bg-[#3E2723] text-[#FFD700] rounded-lg">
                    {{ __('Iniciar Sesión') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>

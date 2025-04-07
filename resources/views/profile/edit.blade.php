<x-guest-layout>
    <div class="max-w-md mx-auto bg-[#5C4033] dark:bg-[#3E2723] shadow-lg rounded-lg p-6 mt-10">
        <h2 class="text-2xl font-bold text-[#FFD700] dark:text-[#FFC107] text-center mb-4">
            {{ __('Iniciar Sesión') }}
        </h2>

        <!-- Mensaje de sesión -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Correo Electrónico -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Correo Electrónico')" class="text-[#FFD700]" />
                <x-text-input id="email" class="block mt-1 w-full bg-[#8B5A2B] text-white border-[#FFD700]" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-[#FFD700]" />
            </div>

            <!-- Contraseña -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Contraseña')" class="text-[#FFD700]" />
                <x-text-input id="password" class="block mt-1 w-full bg-[#8B5A2B] text-white border-[#FFD700]" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-[#FFD700]" />
            </div>

            <!-- Recordarme y Recuperar Contraseña -->
            <div class="flex items-center justify-between mb-4">
                <label for="remember_me" class="flex items-center text-sm text-[#FFD700]">
                    <input id="remember_me" type="checkbox" class="rounded bg-[#8B5A2B] border-[#FFD700] text-[#FFD700] focus:ring-[#FFD700]" name="remember">
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
                <x-primary-button class="w-full py-2 text-lg bg-[#FFD700] text-[#5C4033] hover:bg-[#FFC107]">
                    {{ __('Iniciar Sesión') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>

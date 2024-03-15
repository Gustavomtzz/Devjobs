<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Olvidaste tu Password? No hay problema. Deja aquí tu Email y enviaremos un correo a tu casilla con un
            link para restablecerlo.') }}
        </div>

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-between mt-5">
                <x-link :href="route('login')">
                    Iniciar Sesión
                </x-link>
                <x-link :href="route('register')">
                    Crear Cuenta
                </x-link>
            </div>
            <x-button class="w-full justify-center">
                {{ __('Reestablecer Password') }}
            </x-button>
        </form>
    </x-authentication-card>
</x-guest-layout>
<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Esqueceu sua senha? Sem problemas. Basta nos informar seu endereço de e-mail e enviaremos um e-mail com um link de redefinição de senha que permitirá que você escolha uma nova.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="mb-1"/>
            <x-text-input id="email" style="background-color: red; width: 100%; background-color: #282435; height: 50px; border-radius: 5px; padding: 10px; outline: none; color: #fff; border: solid 1px #b4b3b8;" placeholder="Email" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="btn w-full" style="height: 50px; display: flex; justify-content: center;">
                {{ __('LINK DE REDEFINIÇÃO DE SENHA DE E-MAIL') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

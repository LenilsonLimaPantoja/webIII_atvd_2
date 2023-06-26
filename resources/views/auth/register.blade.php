<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nome')" class="mb-1" />
            <x-text-input id="name" placeholder="Nome de usuário" style="background-color: red; width: 100%; background-color: #282435; height: 50px; border-radius: 5px; padding: 10px; outline: none; color: #fff; border: solid 1px #b4b3b8;" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="mb-1" />
            <x-text-input id="email" placeholder="Email" style="background-color: red; width: 100%; background-color: #282435; height: 50px; border-radius: 5px; padding: 10px; outline: none; color: #fff; border: solid 1px #b4b3b8;" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" class="mb-1" />

            <x-text-input id="password" placeholder="Senha" style="background-color: red; width: 100%; background-color: #282435; height: 50px; border-radius: 5px; padding: 10px; outline: none; color: #fff; border: solid 1px #b4b3b8;" type="password" name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar senha')" class="mb-1" />

            <x-text-input id="password_confirmation" placeholder="Confirmar senha" style="background-color: red; width: 100%; background-color: #282435; height: 50px; border-radius: 5px; padding: 10px; outline: none; color: #fff; border: solid 1px #b4b3b8;" type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Já registrado?') }}
            </a>

        </div>
        <x-primary-button class="mt-4 w-full" style="height: 50px; display: flex; justify-content: center;">
            {{ __('Registrar') }}
        </x-primary-button>
    </form>
</x-guest-layout>
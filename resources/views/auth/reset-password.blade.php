<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="mb-1" />
            <x-text-input id="email" placeholder="Email" style="background-color: red; width: 100%; background-color: #282435; height: 50px; border-radius: 5px; padding: 10px; outline: none; color: #fff; border: solid 1px #b4b3b8;" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
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
            <x-input-label for="password_confirmation" :value="__('Confirmar senha')" class="mb-1"/>

            <x-text-input id="password_confirmation" placeholder="Confirmar senha" style="background-color: red; width: 100%; background-color: #282435; height: 50px; border-radius: 5px; padding: 10px; outline: none; color: #fff; border: solid 1px #b4b3b8;" type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="btn  w-full" style="height: 50px; display: flex; justify-content: center;">
                {{ __('Alterar senha') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
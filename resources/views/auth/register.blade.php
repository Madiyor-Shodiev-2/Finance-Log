<x-guest-layout>
    <link href="{{ asset('css/cyber.css') }}" rel="stylesheet"> <!-- copy css styles -->

    <form method="POST" action="{{ route('register') }}" class="cyber-form">
        @csrf
        <div class="cyber-grid">

            <div class="input-group">
                <div class="input-wrapper">
                    <x-text-input id="name"
                        class="cyber-input"
                        type="text"
                        name="name"
                        :value="old('name')"
                        required
                        placeholder="name" />
                </div>
                <x-input-error :messages="$errors->get('name')" class="error-text" />
            </div>

            <div class="input-group">
                <div class="input-wrapper">
                    <x-text-input id="email"
                        class="cyber-input"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="email" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="error-text" />
            </div>

            <div class="input-group">
                <div class="input-wrapper">
                    <x-text-input id="password"
                        class="cyber-input"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="your password ..." />

                </div>
                <x-input-error :messages="$errors->get('password')" class="error-text" />

            </div>

            <!-- Confirm Password -->
            <div class="input-group">

                <x-text-input id="password_confirmation"
                    class="cyber-input"
                    type="password"
                    name="password_confirmation"
                    required
                    placeholder="accept your password ..." />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <x-primary-button class="input-group">
                <p class="mt-2">
                    {{ __('Register') }}
                </p>
            </x-primary-button>
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>
</x-guest-layout>
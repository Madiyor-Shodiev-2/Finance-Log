<x-guest-layout class="cyber-theme">
    <link href="{{ asset('css/cyber.css') }}" rel="stylesheet"> <!-- copy css styles -->

    <x-auth-session-status class="status-message" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="cyber-form">
        @csrf

        <div class="cyber-grid">
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

                    <button type="button" class="password-toggle" aria-label="Show password">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 12C1 12 5 4 12 4C19 4 23 12 23 12C23 12 19 20 12 20C5 20 1 12 1 12Z" stroke="#5ac8fa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="#5ac8fa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password')" class="error-text" />

                <x-primary-button>
                    <span class="button-text bg-blue-100">{{ __('Sign In') }}</span>
                </x-primary-button>
            </div>


            <div class="row text-center">
                <div class="col-6">
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                        {{ __('forgot password?') }}
                    </a>
                    @endif
                </div>
                <div class="col-6">
                    <a class="
                    underline text-sm text-gray-600 dark:text-gray-400 
                    hover:text-gray-900 dark:hover:text-gray-100 rounded-md 
                    focus:outline-none focus:ring-2 focus:ring-offset-2 
                    focus:ring-indigo-500 dark:focus:ring-offset-gray-800" 
                    href="{{ route('register') }}">

                        {{ __('dont have account?') }}
                        
                    </a>
                </div>
            </div>

        </div>
    </form>
</x-guest-layout>
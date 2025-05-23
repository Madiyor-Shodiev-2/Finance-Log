<x-guest-layout class="cyber-theme">

    <body class="bg-gray-900 font-sans antialiased text-gray-100 min-h-screen flex items-center justify-center p-4 overflow-hidden">

        <!-- Animated Cyber Elements -->
        <div class="fixed inset-0 overflow-hidden -z-10">
            <div class="absolute top-1/4 left-1/4 w-16 h-16 bg-cyber-teal rounded-full opacity-20 animate-float blur-xl"></div>
            <div class="absolute top-1/3 right-1/4 w-24 h-24 bg-cyber-purple rounded-full opacity-15 animate-float-fast animation-delay-1000 blur-xl"></div>
            <div class="absolute bottom-1/4 left-1/3 w-20 h-20 bg-cyber-blue rounded-full opacity-20 animate-float animation-delay-1500 blur-xl"></div>

            <!-- Cyber circuit lines -->
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-cyber-teal to-transparent opacity-30"></div>
            <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-cyber-pink to-transparent opacity-30"></div>
        </div>

        <!-- Main Content Container -->
        <div class="w-full max-w-md animate-fade-in" style="opacity: 0; animation-delay: 300ms;">
            <div class="auth-container cyber-border bg-gray-800/90 rounded-xl shadow-2xl overflow-hidden">
                <!-- Login Form -->
                <div class="p-8">
                    <h2 class="text-2xl font-bold text-gray-100 mb-1 font-cyber">
                        JOIN US - REGISTER
                    </h2>

                    <p class="text-gray-400 mb-6 font-cyber tracking-wider">
                        ENTER YOUR CREDENTIALS
                    </p>

                    <form class="space-y-5" action="{{ route('register') }}" method="POST">
                        @csrf
                        @method('POST')
                        <!-- Name Field -->
                        <div class="space-y-1">
                            <label for="name" class="block text-sm font-medium text-gray-300 font-cyber tracking-wide">
                                YOUR NAME
                            </label>
                            <div class="input-field relative flex items-center border border-gray-700 rounded-lg transition-all duration-200 bg-gray-700/50">
                                <span class="material-icons text-gray-400 absolute left-3">
                                    person
                                </span>
                                <input
                                    id="name"
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    autocomplete="off"
                                    class="w-full pl-10 pr-4 py-3 bg-transparent focus:outline-none text-gray-100 placeholder-gray-500 rounded-lg"
                                    placeholder="your name">

                            </div>
                            @error('name')
                            <span class="text-red-500 text-sm font-cyber tracking-wide">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div class="space-y-1">
                            <label for="email" class="block text-sm font-medium text-gray-300 font-cyber tracking-wide">
                                YOUR EMAIL
                            </label>
                            <div class="input-field relative flex items-center border border-gray-700 rounded-lg transition-all duration-200 bg-gray-700/50">
                                <span class="material-icons text-gray-400 absolute left-3">
                                    person
                                </span>
                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    autocomplete="off"
                                    class="w-full pl-10 pr-4 py-3 bg-transparent focus:outline-none text-gray-100 placeholder-gray-500 rounded-lg"
                                    placeholder="user@gmail.com">
                            </div>
                            @error('email')
                            <span class="text-red-500 text-sm font-cyber tracking-wide">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="space-y-1">
                            <div class="flex justify-between items-center">
                                <label for="password" class="block text-sm font-medium text-gray-300 font-cyber tracking-wide">
                                    PASSWORD
                                </label>
                            </div>
                            <div class="input-field relative flex items-center border border-gray-700 rounded-lg transition-all duration-200 bg-gray-700/50">
                                <span class="material-icons text-gray-400 absolute left-3">lock</span>
                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    class="w-full pl-10 pr-4 py-3 bg-transparent focus:outline-none text-gray-100 placeholder-gray-500 rounded-lg"
                                    placeholder="your password">
                                <button id="password" type="button" class="absolute right-3 text-gray-400 hover:text-cyber-teal transition-colors">
                                    <span class="material-icons">visibility_off</span>
                                </button>
                            </div>
                            @error('password')
                            <span class="text-red-500 text-sm font-cyber tracking-wide">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <!-- Accept Password Field -->
                        <div class="space-y-1">

                            <div class="input-field relative flex items-center border border-gray-700 rounded-lg transition-all duration-200 bg-gray-700/50">
                                <span class="material-icons text-gray-400 absolute left-3">lock</span>
                                <input
                                    id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    class="w-full pl-10 pr-4 py-3 bg-transparent focus:outline-none text-gray-100 placeholder-gray-500 rounded-lg"
                                    placeholder="please enter again">
                                <button id="password_confirmation" type="button" class="absolute right-3 text-gray-400 hover:text-cyber-teal transition-colors">
                                    <span class="material-icons">visibility_off</span>
                                </button>
                            </div>
                            @error('password_confirmation')
                            <span class="text-red-500 text-sm font-cyber tracking-wide">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button
                            type="submit"
                            class="w-full cyber-btn text-gray-900 py-3 px-4 rounded-lg font-bold transition-all duration-200 flex items-center justify-center font-cyber tracking-wider uppercase">
                            <span class="material-icons mr-2">login</span>
                            AUTHENTICATE
                        </button>

                        <!-- Sign Up Link -->
                        <div class="mt-6 text-center">
                            <p class="text-sm text-gray-500 font-cyber tracking-wide">
                                ALREADY REGISTERED? <a href="{{ route('login') }}" class="font-bold text-cyber-teal hover:text-cyber-blue transition-colors">
                                    TO LOGIN
                                </a>
                            </p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </body>
</x-guest-layout>
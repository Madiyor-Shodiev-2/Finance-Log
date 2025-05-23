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
                        JOIN US - LOGIN
                    </h2>
                    <p class="text-gray-400 mb-6 font-cyber tracking-wider">
                        ENTER YOUR CREDENTIALS
                    </p>

                    <form class="space-y-5" actiopn="{{ route('login') }}" method="POST">
                        @csrf
                        @method('POST')
                        <!-- Email Field -->
                        <div class="space-y-1">
                            <label for="email" class="block text-sm font-medium text-gray-300 font-cyber tracking-wide">
                                EMAIL ADDRESS
                            </label>
                            <div class="input-field relative flex items-center border border-gray-700 rounded-lg transition-all duration-200 bg-gray-700/50">
                                <span class="material-icons text-gray-400 absolute left-3">person</span>
                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    autocomplete="off"
                                    required
                                    class="w-full pl-10 pr-4 py-3 bg-transparent focus:outline-none text-gray-100 placeholder-gray-500 rounded-lg"
                                    placeholder="user@gmail.com">
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="space-y-1">
                            <div class="flex justify-between items-center">
                                <label for="password" class="block text-sm font-medium text-gray-300 font-cyber tracking-wide">
                                    PASSWORD
                                </label>
                                <a href="{{ route('password.request') }}" class="text-sm text-cyber-teal hover:text-cyber-blue transition-colors font-cyber">
                                    RECOVER?
                                </a>
                            </div>
                            <div class="input-field relative flex items-center border border-gray-700 rounded-lg transition-all duration-200 bg-gray-700/50">
                                <span class="material-icons text-gray-400 absolute left-3">lock</span>
                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    autocomplete="off"
                                    required
                                    class="w-full pl-10 pr-4 py-3 bg-transparent focus:outline-none text-gray-100 placeholder-gray-500 rounded-lg"
                                    placeholder="••••••••">
                                <button id="password" type="button" class="absolute right-3 text-gray-400 hover:text-cyber-teal transition-colors">
                                    <span class="material-icons">visibility_off</span>
                                </button>
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center">
                            <input id="remember" type="checkbox" class="h-4 w-4 text-cyber-teal focus:ring-cyber-teal border-gray-600 rounded bg-gray-700">
                            <label for="remember" class="ml-2 block text-sm text-gray-300 font-cyber tracking-wide">PERSIST SESSION</label>
                        </div>

                        <!-- Submit Button -->
                        <button
                            type="submit"
                            class="w-full cyber-btn text-gray-900 py-3 px-4 rounded-lg font-bold transition-all duration-200 flex items-center justify-center font-cyber tracking-wider uppercase">
                            <span class="material-icons mr-2">login</span>
                            AUTHENTICATE
                        </button>
                    </form>

                    <!-- Social Login
                    <div class="mt-6">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-700"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-gray-800 text-gray-500 font-cyber tracking-wider">ALTERNATE ACCESS</span>
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-2 gap-3">
                            <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-700 rounded-lg shadow-sm bg-gray-800 text-sm font-medium text-gray-300 hover:bg-gray-700 transition-colors items-center font-cyber tracking-wide">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 0C4.477 0 0 4.477 0 10c0 4.42 2.865 8.166 6.839 9.489.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.34-3.369-1.34-.454-1.156-1.11-1.462-1.11-1.462-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.933.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.48C17.14 18.163 20 14.418 20 10c0-5.523-4.477-10-10-10z" clip-rule="evenodd" />
                                </svg>
                                GITHUB
                            </a>
                            <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-700 rounded-lg shadow-sm bg-gray-800 text-sm font-medium text-gray-300 hover:bg-gray-700 transition-colors items-center font-cyber tracking-wide">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 0C4.477 0 0 4.477 0 10c0 5.523 4.477 10 10 10 5.523 0 10-4.477 10-10 0-5.523-4.477-10-10-10zm4.293 13.707a1 1 0 01-1.414 1.414L10 11.414l-2.879 2.879a1 1 0 01-1.414-1.414L8.586 10 5.707 7.121a1 1 0 011.414-1.414L10 8.586l2.879-2.879a1 1 0 011.414 1.414L11.414 10l2.879 2.879z" clip-rule="evenodd" />
                                </svg>
                                WEB3
                            </a>
                        </div>
                    </div> -->

                    <!-- Sign Up Link -->
                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-500 font-cyber tracking-wide">
                            NEW USER? <a href="/register" class="font-bold text-cyber-teal hover:text-cyber-blue transition-colors">REQUEST ACCESS</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</x-guest-layout>
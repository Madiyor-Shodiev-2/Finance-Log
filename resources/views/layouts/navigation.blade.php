<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow-sm sticky 
top-0 z-50 mx-4 px-3">
    <div class="nav-container">
        <!-- Logo & Main Nav -->
        <div class="nav-logo">
            <a href="#" class="flex items-center focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 rounded-md">
                <svg class="h-9 w-9 text-indigo-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M12 2L3 8V22H21V8L12 2Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                    <path d="M7 12H17M7 16H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                    <circle cx="12" cy="12" r="2.5" fill="currentColor" class="text-indigo-400" />
                </svg>
                <span class="ml-2 text-xl font-bold text-gray-900">Finance<span class="text-indigo-700">Log</span></span>
            </a>
            <div class="hidden sm:flex nav-links">
                <a href="{{ route('transactions.index') }}" class="border-b-2 border-transparent text-sm font-medium text-gray-700 hover:text-gray-900 hover:border-gray-300">Transactions</a>
                <a href="#" class="border-b-2 border-transparent text-sm font-medium text-gray-700 hover:text-gray-900 hover:border-gray-300">Categories</a>
            </div>
        </div>

        @if(auth()->check())
        <!-- Right Section -->
        <div class="sm:flex my-1" style="margin-left: 20rem; margin-bottom:0rem;">
            <div class="stats-block flex items-center gap-1">
                <span class="text-sm font-medium text-gray-600">Balance:</span>
                <span class="text-sm font-semibold text-gray-900">${{ auth()->user()->balance }}</span>
            </div>
            <div class="profile-block">
                <button type="button" class="flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 hover:ring-2 hover:ring-offset-2 hover:ring-indigo-300">
                    <span class="sr-only">Open user menu</span>
                    <div class="h-9 w-9 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-medium shadow-sm">
                        {{ auth()->user()->name }}
                    </div>
                </button>
            </div>
        </div>
        <div class="stats-block flex items-center gap-2">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                @method("POST")
                <button type="submit" class="btn btn-danger">Logout</buttojn>
            </form>
        </div>
        @else
        <div class="sm:flex my-1" style="margin-left: 40rem; margin-bottom:0rem;">
            <div class="stats-block flex items-center gap-1">
                <a href="{{ route('login') }}" class="btn btn-outline-primary border-b-2 border-indigo-600 text-sm font-semibold text-gray-900" style="text-decoration-line:underline">Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-primary border-b-2 border-indigo-600 text-sm font-semibold text-gray-900" style="text-decoration-line:underline">Register</a>
            </div>
        </div>
        @endif

        <!-- Mobile menu button -->
        <div class="flex items-center sm:hidden">
            <button
                @click="open = !open"
                type="button"
                class="p-2 rounded-md text-gray-500 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                :aria-expanded="open"
                aria-label="Main menu">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" :class="{ 'hidden': open, 'block': !open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg class="h-6 w-6" :class="{ 'hidden': !open, 'block': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="open" x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-1"
        class="sm:hidden bg-white shadow-lg ring-1 ring-black ring-opacity-5 mobile-menu">
        <a href="{{ route('transactions.index') }}" class="border-l-4 border-transparent text-gray-700 hover:bg-gray-50 hover:border-gray-300 font-medium">
            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
            </svg>
            Transactions
        </a>
        <a href="#" class="border-l-4 border-transparent text-gray-700 hover:bg-gray-50 hover:border-gray-300 font-medium">
            <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Categories
        </a>
        @if(auth()->check())
        <div class="mobile-profile">
            <div class="flex items-center gap-3">
                <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-medium shadow-inner">JD</div>
                <div>
                    <div class="text-base font-semibold text-gray-900">John Doe</div>
                    <div class="text-sm font-medium text-gray-600">john@example.com</div>
                </div>
            </div>
            <div class="stats-block flex justify-between items-center">
                <span class="text-sm font-medium text-gray-700">Account Balance</span>
                <span class="text-sm font-semibold text-gray-900">$24,589.34</span>
            </div>
            <div class="stats-block flex justify-between items-center">
                <span class="text-sm font-medium text-gray-700">Weekly Change</span>
                <span class="text-sm font-semibold text-green-700 flex items-center">
                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    +2.4%
                </span>
            </div>
        </div>
        @else
        <div class="mobile-profile">
            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            </div>
        </div>
        @endif
    </div>
</nav>
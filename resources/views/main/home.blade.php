<x-app-layout>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                        secondary: {
                            50: '#f5f3ff',
                            100: '#ede9fe',
                            200: '#ddd6fe',
                            300: '#c4b5fd',
                            400: '#a78bfa',
                            500: '#8b5cf6',
                            600: '#7c3aed',
                            700: '#6d28d9',
                            800: '#5b21b6',
                            900: '#4c1d95',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Main Content -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900">Dashboard Overview</h2>
            <p class="mt-1 text-gray-600">Your financial summary and recent activity</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-primary-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Balance</p>
                        <p class="mt-1 text-2xl font-semibold text-gray-900">${{ auth()->user()->balance }}</p>
                    </div>
                    <div class="bg-primary-100 p-3 rounded-lg">
                        <span class="material-icons text-primary-600">account_balance_wallet</span>
                    </div>
                </div>
                <p class="mt-2 text-xs text-gray-500 flex items-center">
                    <span class="material-icons text-green-500 text-sm mr-1">trending_up</span>
                    5.2% from last month <!-- Backend please -->
                </p>
            </div>

            <!-- Bu yerda foydanalanuvchi uchun haqiqiy balansini ko'rish uchun yordam beradigan karta -->
            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-secondary-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Real balance</p>
                        <p class="mt-1 text-2xl font-semibold text-gray-900">${{ auth()->user()->real_balance }}</p>
                    </div>
                    <div class="bg-secondary-100 p-3 rounded-lg">
                        <span class="material-icons text-secondary-600">savings</span>
                    </div>
                </div>
                <p class="mt-2 text-xs text-gray-500 flex items-center">
                    <span class="material-icons text-green-500 text-sm mr-1">trending_up</span> <!-- Backend please -->
                    2.1% from last month <!-- Backend please -->
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Income</p>
                        <p class="mt-1 text-2xl font-semibold text-gray-900">${{ $monthlyTransactions->kirim }}</p>
                    </div>
                    <div class="bg-green-100 p-3 rounded-lg">
                        <span class="material-icons text-green-600">south_west</span>
                    </div>
                </div>
                <p class="mt-2 text-xs text-gray-500 flex items-center">
                    <span class="material-icons text-green-500 text-sm mr-1">trending_up</span>
                    12% from last month <!-- Backend please -->
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-red-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Expenses</p>
                        <p class="mt-1 text-2xl font-semibold text-gray-900">${{ $monthlyTransactions->chiqim }}</p>
                    </div>
                    <div class="bg-red-100 p-3 rounded-lg">
                        <span class="material-icons text-red-600">north_east</span>
                    </div>
                </div>
                <p class="mt-2 text-xs text-gray-500 flex items-center">
                    <span class="material-icons text-red-500 text-sm mr-1">trending_down</span>
                    3.5% from last month
                </p>
            </div>

        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm p-6 lg:col-span-2">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900">Spending Overview</h3>
                    <div class="flex items-center space-x-2">
                        <button class="px-3 py-1 text-xs font-medium rounded-lg bg-primary-100 text-primary-600">Month</button>
                        <button class="px-3 py-1 text-xs font-medium rounded-lg text-gray-500 hover:bg-gray-100">Year</button>
                    </div>
                </div>
                <div class="h-64 bg-gray-50 rounded-lg flex items-center justify-center">
                    <p class="text-gray-400">Chart visualization would appear here</p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Budget Categories</h3>
                <div class="space-y-4">
                    @foreach ($categories as $category)
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="font-medium">{{ $category->label }}</span>
                            <span>75%</span> <!-- Backend please -->
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-red-500 h-2 rounded-full" style="width: 75%"></div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

        <!-- Recent Transactions -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-medium text-gray-900">Recent Transactions</h3>
                    <button class="text-primary-600 hover:text-primary-700 text-sm font-medium flex items-center">
                        View All
                        <span class="material-icons ml-1 text-sm">chevron_right</span>
                    </button>
                </div>
            </div>
            @foreach ($transactions as $transaction)
            <div class="divide-y divide-gray-200">
                <div class="px-6 py-4 hover:bg-gray-50 transition-colors duration-150">
                    <div class="flex items-center">
                        <div class="bg-green-100 p-3 rounded-lg mr-4">
                            <span class="material-icons text-{{ $transaction->type ? 'green' : 'red' }}-600"> {{ $transaction->type ? "trending_up" : "trending_down" }}</span>
                        </div>
                        <div class="flex-grow">
                            <div class="flex items-center justify-between">
                                <p class="font-medium text-gray-900">{{ $transaction->category->label }}</p>
                                <p class="font-medium text-{{ $transaction->type ? 'green' : 'red' }}-600">${{ $transaction->amount }}</p>
                            </div>
                            <p class="text-sm text-gray-500 mt-1">{{ $transaction->type ? "Income" : "Expences" }} • {{ \Carbon\Carbon::parse($transaction->date)->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </main>


</x-app-layout>
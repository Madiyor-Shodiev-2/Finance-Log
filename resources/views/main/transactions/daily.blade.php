<x-app-layout>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            600: '#0284c7',
                            700: '#0369a1',
                        },
                        success: {
                            100: '#dcfce7',
                            500: '#22c55e',
                            600: '#16a34a',
                        },
                        danger: {
                            100: '#fee2e2',
                            500: '#ef4444',
                            600: '#dc2626',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', '-apple-system', 'sans-serif'],
                    },
                    boxShadow: {
                        'card': '0 4px 12px rgba(0, 0, 0, 0.05)',
                    }
                }
            }
        }
    </script>

    <div class="max-w-6xl mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Daily Transactions</h1>
                <p class="text-gray-600">
                {{ \Carbon\Carbon::parse($dailyBalance->date)
                    ->format('M d Y')  }}
                </p>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-card p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Total Income</p>
                        <p class="text-2xl font-semibold text-success-600 mt-1">
                            ${{ $dailyBalance->kirim }}
                        </p>
                    </div>
                    <div class="bg-success-100 p-3 rounded-lg">
                        <span class="material-icons text-success-600">south_west</span>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-card p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Total Expenses</p>
                        <p class="text-2xl font-semibold text-danger-600 mt-1">
                            {{ $dailyBalance->chiqim }}
                        </p>
                    </div>
                    <div class="bg-danger-100 p-3 rounded-lg">
                        <span class="material-icons text-danger-600">north_east</span>
                    </div>
                </div>
            </div>

        </div>

        <!-- Transactions Table -->
        <div class="bg-white rounded-xl shadow-card overflow-hidden">
            <!-- Table Header -->
            <div class="grid grid-cols-12 gap-4 px-6 py-4 border-b border-gray-200 bg-gray-50">
                <div class="col-span-5 md:col-span-4 text-sm font-medium text-gray-700">
                    Description
                </div>
                <div class="col-span-3 md:col-span-2 text-sm font-medium text-gray-700">
                    Category
                </div>
                <div class="col-span-2 text-sm font-medium text-gray-700">
                    Time
                </div>
                <div class="col-span-2 text-sm font-medium text-gray-700 text-right">
                    Amount
                </div>
            </div>

            <!-- Table Rows -->
            <div class="divide-y divide-gray-200">

                @foreach ($daily as $day)
                <!-- Income Example -->
                <div class="grid grid-cols-12 gap-4 px-6 py-4 items-center transaction-row">
                    <div class="col-span-5 md:col-span-4 flex items-center">
                        
                        <div class="bg-success-100 p-2 rounded-lg mr-3">
                            <span class="material-icons text-
                                {{ $day->type ? "success" : "danger" }}-600 text-lg">
                                {{ $day->type ? "south_west" : "north_east" }}
                            </span>
                        </div>
                    
                        <div>
                            <p class="font-medium text-gray-900">
                            {{ $day->description }}
                            </p>
                            <p class="text-sm text-gray-500">
                                ACME Corporation
                            </p>
                        </div>
                    
                    </div>
                    
                    <div class="col-span-3 md:col-span-2">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{$day->type ? "green" : "red"}}-100 text-{{$day->type ? "green" : "red"}}-800">
                            {{ $day->type ? "Income" : "Expense" }}
                        </span>
                    </div>
                    
                    <div class="col-span-2 text-sm text-gray-500">
                        {{ \Carbon\Carbon::parse($day->date)
                            ->format('M d') }}
                    </div>
                    
                    <div class="col-span-2 text-right font-medium 
                        {{ $day->type ? "income-amount" : "expense-amount" }} ">
                        +${{ $day->amount }}
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>


</x-app-layout>
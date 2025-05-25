<x-app-layout>

    <script src="https://cdn.tailwindcss.com"></script>

    <div class=" flex flex-col items-center justify-center p-6">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            @if($errors->has('auth'))
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    <a href="{{ route('login') }}">Login</a>
                </ul>
            </div>
            @elseif($errors->all())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <ol>{{ $error }}</ol>
                    @endforeach
                </ul>
            </div>
            @endif

            <h1 class="text-2xl font-bold mb-4 text-center">Add Transaction</h1>
            <form action="{{ route('transactions.store') }}" method="POST">
                @csrf
                @method("POST")
                <!-- Transaction Form -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Amount (USD)
                        </label>
                        <input name="amount"
                               type="number"
                               id="amount"
                               class="mt-1 block w-full p-2 border border-gray-300 rounded-md" 
                               placeholder="Enter amount" 
                               required>
                    </div>

                    <div>
                        <label from="description" class="block text-sm font-medium text-gray-700">
                            Enter description
                        </label>
                        <input name="description" 
                               type="text" 
                               id="description" 
                               class="mt-1 block w-full p-2 border border-gray-300 rounded-md" 
                               placeholder="Enter description" 
                               required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Transaction Type</label>
                        <div class="flex items-center space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="type" value="true" class="form-radio text-green-500">
                                <span class="ml-2 text-green-700">Income</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="type" value="false" class="form-radio text-red-500">
                                <span class="ml-2 text-red-700">Expense</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <!-- Shu yerdan malumotlar ketadi -->
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="flex flex-col items-center justify-center bg-gray-50 ">
        <div class="flex flex-col md:flex-row gap-6 w-full max-w-6xl justify-center">
            <!-- Daily Card -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 w-full max-w-xs transition-all hover:shadow-md">
                <div class="p-5">
                    <div class="flex items-center mb-3">
                        <div class="bg-blue-100 p-2 rounded-lg mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-800">Дневной расход</h3>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Доход:</span>
                            <span class="font-medium text-green-600">{{ $daily->kirim }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Расход:</span>
                            <span class="font-medium text-red-600">{{ $daily->chiqim }}</span>
                        </div>
                        <a href="{{ route('transactions.daily') }}" class="btn btn-info" style="width: 14rem;">show</a>
                    </div>
                </div>
            </div>

            <!-- Weekly Card -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 w-full max-w-xs transition-all hover:shadow-md">
                <div class="p-5">
                    <div class="flex items-center mb-3">
                        <div class="bg-purple-100 p-2 rounded-lg mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-800">Расходы на неделю</h3>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Доход:</span>
                            <span class="font-medium text-green-600">{{ $weekly->kirim }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Расход:</span>
                            <span class="font-medium text-red-600">{{ $weekly->chiqim }}</span>
                        </div>
                        <a href="{{ route('transactions.weekly') }}" class="btn btn-info" style="width: 14rem;">show</a>
                    </div>
                </div>
            </div>

            <!-- Monthly Card -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 w-full max-w-xs transition-all hover:shadow-md">
                <div class="p-5">
                    <div class="flex items-center mb-3">
                        <div class="bg-amber-100 p-2 rounded-lg mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-800">Расходы на месяц</h3>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Доход:</span>
                            <span class="font-medium text-green-600">{{ $monthly->kirim }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Расход:</span>
                            <span class="font-medium text-red-600">{{ $monthly->chiqim }}</span>
                        </div>
                        <a href="{{ route('transactions.monthly') }}" class="btn btn-info" style="width: 14rem;">show</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
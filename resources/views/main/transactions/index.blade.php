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
                        <label class="block text-sm font-medium text-gray-700">Amount (USD)</label>
                        <input name="amount" type="number" id="amount" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Enter amount" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Transaction label</label>
                        <select name="category_id" id="category_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                            <option value="">Select label</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->label }}</option>
                            @endforeach
                        </select>
                        <button id="addNewTypeBtn" class="mt-2 text-sm text-blue-600 hover:underline">Add new type</button>
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
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class=" flex flex-col items-center justify-center p-6">
        <div class="row">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Дневной расход</h5>
                    <p class="card-text">Доход: {{ $daily->kirim }}</p>
                    <p class="card-text">Расход: {{ $daily->chiqim }}</p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Расходы на неделю</h5>
                    <p class="card-text">Доход: {{ $weekly->kirim }}</p>
                    <p class="card-text">Расход: {{ $weekly->chiqim }}</p>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Расходы на год</h5>
                    <p class="card-text">Доход: {{ $monthly->kirim }}</p>
                    <p class="card-text">Расход: {{ $monthly->chiqim }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
 <!-- Navigation -->
 <nav class="bg-white shadow-sm py-4">
     <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
         <div class="flex justify-between items-center">
             <div class="flex items-center">
                 <span class="material-icons text-primary-600 text-3xl mr-2">account_balance</span>
                 <span class="text-xl font-semibold">FinanceLog</span>
             </div>
             <div class="hidden md:flex items-center space-x-8">
                 <a href="{{ route('home')}}" class="text-gray-600 hover:text-primary-600 transition-colors">Dashboard</a>
                 <a href="{{ route('transactions.index') }}" class="text-gray-600 hover:text-primary-600 transition-colors">Transactions</a>
                 @if(!auth()->check())
                 <a href="/login" class="text-primary-600 hover:text-primary-700 font-medium">Log In</a>
                 <a href="/register" class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                     Get Started
                 </a>
                 @else
                 <form action="{{ route('logout') }}" method="POST">
                     @csrf
                     @method('POST')
                     <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                         Log Out
                     </button>
                 </form>
                 @endif
                 <!-- Foydanalanuvchini profilini qo'shish kerak! -->
             </div>
             <button class="md:hidden text-gray-600">
                 <span class="material-icons text-3xl">menu</span>
             </button>
         </div>
     </div>
 </nav>
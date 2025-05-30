 <!-- Navigation -->
 <nav class="bg-white shadow-sm py-4">
     <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
         <div class="flex justify-between items-center">
             <div class="flex items-center">
                 <span class="material-icons text-primary-600 text-3xl mr-2">account_balance</span>
                 <span class="text-xl font-semibold">FinanceLog</span>
             </div>
             <div class="hidden md:flex items-center space-x-8">
                 @if(!auth()->check())
                 <a href="/login" class="text-primary-600 hover:text-primary-700 font-medium">
                    {{ __('auth.login') }}
                </a>
                 <a href="/register" class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                     {{ __('auth.register') }}
                 </a>
                 @else
                 <a href="{{ route('home', ['locale' => 'ru']) }}">Русский</a>
                 <a href="{{ route('home', ['locale' => 'en']) }}">English</a>
                 <a href="{{ route('home', ['locale' => session('locale')])}}" class="text-gray-600 hover:text-primary-600 transition-colors">
                    {{ __('navigation.links.dashboard') }}
                </a>
                 <a href="{{ route('transactions.index', ['locale' => session('locale')]) }}" class="text-gray-600 hover:text-primary-600 transition-colors">
                    {{ __('navigation.links.transactions') }}
                </a>
                 <form action="{{ route('logout') }}" method="POST">
                     @csrf
                     @method('POST')
                     <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                         {{ __('auth.logout') }}
                     </button>
                 </form>
                 @endif
                 <!-- TODO: Foydanalanuvchini profilini qo'shish kerak! -->
             </div>
             <button class="md:hidden text-gray-600">
                 <span class="material-icons text-3xl">menu</span>
             </button>
         </div>
     </div>
 </nav>
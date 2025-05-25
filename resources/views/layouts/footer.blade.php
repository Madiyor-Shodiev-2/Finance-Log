<!-- Footer -->
<footer class="bg-white border-t border-gray-200 py-8 mt-4">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="flex items-center mb-4 md:mb-0">
                <span class="material-icons text-primary-600 text-2xl mr-2">account_balance</span>
                <span class="text-lg font-semibold">FinanceLog</span>
            </div>
            <div class="flex flex-wrap justify-center gap-6">
                <a href="#" class="text-gray-600 hover:text-primary-600 transition-colors">
                    {{ __('footer.links.privacy') }}
                </a>
                <a href="#" class="text-gray-600 hover:text-primary-600 transition-colors">
                    {{ __('footer.links.terms') }}
                </a>
                <a href="#" class="text-gray-600 hover:text-primary-600 transition-colors">
                    {{ __('footer.links.contact') }}
                </a>
                <a href="#" class="text-gray-600 hover:text-primary-600 transition-colors">
                    {{ __('footer.links.about') }}
                </a>
            </div>
        </div>
        <div class="mt-8 text-center text-gray-500 text-sm">
            © 2025 FinanceLog. {{ __('footer.prefix') }}
        </div>
    </div>
</footer>
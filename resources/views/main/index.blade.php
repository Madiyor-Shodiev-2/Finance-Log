<x-app-layout>
    <!-- Hero Section -->
    <div class="min-h-screen flex flex-col">
            <!-- Main Content -->
            <main class="flex-grow">
                <!-- Hero -->
                <section class="py-12 sm:py-20 px-4 sm:px-6 lg:px-8">
                    <div class="max-w-4xl mx-auto text-center">
                        <h1 class="text-4xl sm:text-5xl font-bold tracking-tight text-gray-900 mb-6">
                            Take Control of <span class="text-primary-600">Your Money</span>
                        </h1>
                        <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-10">
                            FinanceLog helps you track income and expenses with minimal effort, so you can focus on what matters.
                        </p>
                        <div class="flex flex-col sm:flex-row justify-center gap-4">
                            <a href="/register" class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-lg font-medium text-lg shadow-sm transition-colors">
                                Start Tracking Now
                            </a>
                            <a href="#features" class="border border-gray-300 hover:bg-gray-50 text-gray-700 px-6 py-3 rounded-lg font-medium text-lg shadow-sm transition-colors">
                                Learn More
                            </a>
                        </div>
                    </div>
                    <div class="max-w-5xl mx-auto mt-16">
                        <div class="bg-white p-2 rounded-xl shadow-lg border border-gray-200">
                            <div class="bg-gray-100 rounded-lg h-80 flex items-center justify-center">
                                <p class="text-gray-400">App screenshot preview would appear here</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Features -->
                <section id="features" class="py-16 bg-white">
                    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="text-center mb-16">
                            <h2 class="text-3xl font-bold text-gray-900 mb-4">Simple, Powerful Money Tracking</h2>
                            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                                FinanceLog makes personal finance management effortless while providing meaningful insights.
                            </p>
                        </div>
                        <div class="grid md:grid-cols-3 gap-10">
                            <div class="bg-gray-50 rounded-xl p-6 hover:shadow-md transition-shadow">
                                <div class="bg-primary-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                                    <span class="material-icons text-primary-600 text-2xl">insights</span>
                                </div>
                                <h3 class="text-xl font-semibold mb-3">Track Spending</h3>
                                <p class="text-gray-600">
                                    Monitor where every dollar goes with intuitive categorization and visual reports.
                                </p>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-6 hover:shadow-md transition-shadow">
                                <div class="bg-green-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                                    <span class="material-icons text-green-600 text-2xl">trending_up</span>
                                </div>
                                <h3 class="text-xl font-semibold mb-3">Income Analysis</h3>
                                <p class="text-gray-600">
                                    Understand your cash flow patterns and identify opportunities to save more.
                                </p>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-6 hover:shadow-md transition-shadow">
                                <div class="bg-secondary-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                                    <span class="material-icons text-secondary-600 text-2xl">category</span>
                                </div>
                                <h3 class="text-xl font-semibold mb-3">Smart Categories</h3>
                                <p class="text-gray-600">
                                    Automatic categorization for common expenses like food, transport, and bills.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- About -->
                <section class="py-16 bg-gray-50">
                    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex flex-col md:flex-row items-center gap-12">
                            <div class="md:w-1/2">
                                <h2 class="text-3xl font-bold text-gray-900 mb-6">About FinanceLog</h2>
                                <p class="text-gray-600 mb-4">
                                    FinanceLog (formerly WhereMoneyGoes) is a minimalist web application designed to help you track personal income and expenses without unnecessary complexity.
                                </p>
                                <p class="text-gray-600 mb-6">
                                    Our MVP focuses on delivering essential financial insights with clarity, helping you monitor cash flow, analyze spending patterns, and make better money decisions.
                                </p>
                                <ul class="space-y-3">
                                    <li class="flex items-start">
                                        <span class="material-icons text-green-500 mr-2">check_circle</span>
                                        <span class="text-gray-600">Daily, monthly, and yearly spending analysis</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="material-icons text-green-500 mr-2">check_circle</span>
                                        <span class="text-gray-600">Intuitive transaction categorization</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="material-icons text-green-500 mr-2">check_circle</span>
                                        <span class="text-gray-600">Clean, distraction-free interface</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="md:w-1/2 bg-white p-4 rounded-xl shadow-sm border border-gray-200">
                                <div class="bg-gray-100 rounded-lg h-80 flex items-center justify-center">
                                    <p class="text-gray-400">App interface demo would appear here</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- CTA -->
                <section class="py-16 bg-primary-600 text-white">
                    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
                        <h2 class="text-3xl font-bold mb-6">Ready to Take Control of Your Finances?</h2>
                        <p class="text-lg text-primary-100 mb-8 max-w-2xl mx-auto">
                            Join thousands of users who are already managing their money smarter with FinanceLog.
                        </p>
                        <a href="/register" class="inline-block bg-white text-primary-600 hover:bg-gray-100 px-8 py-3 rounded-lg font-medium text-lg shadow-md transition-colors">
                            Get Started for Free
                        </a>
                    </div>
                </section>
            </main>
    </div>
</x-app-layout>
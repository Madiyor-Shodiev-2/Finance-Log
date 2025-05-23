<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FinanceLog') }} - Track Where Your Money Goes</title>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('icons/site.webmanifest') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Rajdhani:wght@500;600;700&display=swap" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                        cyber: {
                            teal: '#00f5d4',
                            pink: '#f15bb5',
                            purple: '#9b5de5',
                            yellow: '#fee440',
                            blue: '#00bbf9'
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', '-apple-system', 'sans-serif'],
                        'cyber': ['Rajdhani', 'Inter', 'sans-serif']
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-fast': 'float 4s ease-in-out infinite',
                        'fade-in': 'fadeIn 0.5s ease-out forwards',
                        'pulse-slow': 'pulse 6s infinite',
                        'neon-glow': 'neonGlow 2s ease-in-out infinite alternate'
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-20px)'
                            },
                        },
                        fadeIn: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(10px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            },
                        },
                        neonGlow: {
                            '0%': {
                                'text-shadow': '0 0 5px rgba(0, 245, 212, 0.8), 0 0 10px rgba(0, 245, 212, 0.6)'
                            },
                            '100%': {
                                'text-shadow': '0 0 10px rgba(0, 245, 212, 0.8), 0 0 20px rgba(0, 245, 212, 0.6), 0 0 30px rgba(0, 245, 212, 0.4)'
                            }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .auth-container {
            background: radial-gradient(circle at 25% 50%, rgba(0, 245, 212, 0.05) 0%, rgba(0, 0, 0, 0.9) 70%);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 30px rgba(0, 245, 212, 0.1);
        }

        .input-field:focus-within {
            box-shadow: 0 0 0 4px rgba(0, 245, 212, 0.3);
            border-color: #00f5d4;
        }

        .cyber-btn {
            background: linear-gradient(135deg, #00f5d4 0%, #00bbf9 100%);
            box-shadow: 0 4px 15px rgba(0, 245, 212, 0.3);
            transition: all 0.3s ease;
        }

        .cyber-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 245, 212, 0.4);
        }

        .cyber-btn:active {
            transform: translateY(0);
        }

        .cyber-border {
            position: relative;
        }

        .cyber-border::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #00f5d4, #9b5de5, #f15bb5, #fee440, #00f5d4);
            background-size: 400%;
            z-index: -1;
            border-radius: inherit;
            opacity: 0;
            transition: 0.5s;
        }
    </style>
</head>

<body class="font-sans antialiased text-gray-900 dark:text-gray-100 bg-gray-50 dark:bg-gray-900 h-full">
    <div class="min-h-full flex">
        <!-- Left decorative panel (hidden on mobile) -->
        <div class="hidden lg:block relative w-0 flex-1 bg-gradient-to-br from-indigo-600 to-indigo-800">
            <div class="absolute inset-0 flex items-center justify-center p-5">
                <div class="max-w-md">
                    <div class="flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="ml-2 text-2xl font-bold text-white">FinanceLog</span>
                    </div>
                    <h2 class="text-3xl font-bold text-white mb-4">Track Where Your Money Goes</h2>
                    <p class="text-lg text-indigo-100">
                        Simple, clear financial tracking for your income and expenses.
                        Gain insights into your spending habits with minimal effort.
                    </p>
                    <div class="mt-8 grid grid-cols-3 gap-4">
                        <div class="bg-white/10 p-4 rounded-lg backdrop-blur-sm">
                            <h3 class="text-white font-medium">Daily</h3>
                            <p class="text-indigo-100 text-sm">Track your daily cash flow</p>
                        </div>
                        <div class="bg-white/10 p-4 rounded-lg backdrop-blur-sm">
                            <h3 class="text-white font-medium">Categories</h3>
                            <p class="text-indigo-100 text-sm">Food, transport, salary</p>
                        </div>
                        <div class="bg-white/10 p-4 rounded-lg backdrop-blur-sm">
                            <h3 class="text-white font-medium">Reports</h3>
                            <p class="text-indigo-100 text-sm">Monthly/yearly insights</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content area -->
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24 bg-white dark:bg-gray-800">
            <div class="mx-auto w-full max-w-md lg:w-96">

                <!-- Slot for login/register forms -->
                <div class="bg-white dark:bg-gray-700 shadow-sm rounded-lg ">
                    {{ $slot }}
                </div>

            </div>
        </div>
    </div>

    <script>
        // Initialize animations
        document.addEventListener('DOMContentLoaded', () => {
            // Input focus effects
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('focus', () => {
                    input.parentElement.classList.add('ring-2', 'ring-cyber-teal/50');
                });
                input.addEventListener('blur', () => {
                    input.parentElement.classList.remove('ring-2', 'ring-cyber-teal/50');
                });
            });

            // Password visibility toggle
            const passwordToggle = document.querySelector('button[id="password"]');
            if (passwordToggle) {
                passwordToggle.addEventListener('click', () => {
                    const passwordInput = document.getElementById('password');
                    const icon = passwordToggle.querySelector('.material-icons');
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        icon.textContent = 'visibility';
                    } else {
                        passwordInput.type = 'password';
                        icon.textContent = 'visibility_off';
                    }
                });
            }

            const confirmPasswordToggle = 
            document.querySelector('button[id="password_confirmation"]');
            
            if(confirmPasswordToggle) {
                confirmPasswordToggle.addEventListener('click', () => {
                    const passwordInput = document.getElementById('password_confirmation');
                    const icon = confirmPasswordToggle.querySelector('.material-icons');
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        icon.textContent = 'visibility';
                    } else {
                        passwordInput.type = 'password';
                        icon.textContent = 'visibility_off';
                    }
                });
            }


            // Add cyber noise effect to background
            const bgGrid = document.querySelector('.bg-grid');
            if (bgGrid) {
                const canvas = document.createElement('canvas');
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
                bgGrid.appendChild(canvas);

                const ctx = canvas.getContext('2d');
                const gridSize = 40;

                function drawGrid() {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    ctx.strokeStyle = 'rgba(0, 245, 212, 0.1)';
                    ctx.lineWidth = 1;

                    // Vertical lines
                    for (let x = 0; x <= canvas.width; x += gridSize) {
                        ctx.beginPath();
                        ctx.moveTo(x, 0);
                        ctx.lineTo(x, canvas.height);
                        ctx.stroke();
                    }

                    // Horizontal lines
                    for (let y = 0; y <= canvas.height; y += gridSize) {
                        ctx.beginPath();
                        ctx.moveTo(0, y);
                        ctx.lineTo(canvas.width, y);
                        ctx.stroke();
                    }
                }

                drawGrid();
                window.addEventListener('resize', () => {
                    canvas.width = window.innerWidth;
                    canvas.height = window.innerHeight;
                    drawGrid();
                });
            }
        });
    </script>
</body>

</html>
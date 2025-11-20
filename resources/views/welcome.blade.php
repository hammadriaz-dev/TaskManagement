<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'TaskFlow') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <!-- Fallback for development if Vite isn't running (Optional: Remove in production) -->
        <script src="https://cdn.tailwindcss.com"></script>
    @endif

    <style>
        /* Custom Grid Background for a tech feel */
        .bg-grid-pattern {
            background-size: 40px 40px;
            background-image: linear-gradient(to right, rgba(0, 0, 0, 0.05) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(0, 0, 0, 0.05) 1px, transparent 1px);
        }
        @media (prefers-color-scheme: dark) {
            .bg-grid-pattern {
                background-image: linear-gradient(to right, rgba(255, 255, 255, 0.05) 1px, transparent 1px),
                                  linear-gradient(to bottom, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
            }
        }
    </style>
</head>
<body class="antialiased bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] font-['Instrument_Sans']">

    <div class="relative min-h-screen flex flex-col selection:bg-[#FF2D20] selection:text-white">
        
        <!-- Background Decorative Elements -->
        <div class="fixed inset-0 -z-10 h-full w-full bg-grid-pattern [mask-image:radial-gradient(ellipse_at_center,transparent_20%,black)]"></div>

        <!-- Navbar -->
        <header class="w-full container mx-auto px-6 py-6 flex justify-between items-center relative z-50">
            <!-- Logo -->
            <div class="flex items-center gap-2">
                <div class="h-8 w-8 bg-black dark:bg-white rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white dark:text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-tight">TaskSystem</span>
            </div>

            <!-- YOUR AUTH HEADER LOGIC -->
            <div class="flex items-center gap-4">
                <!-- This is the exact code block you provided, wrapped in a div -->
                @if (Route::has('login'))
                    <nav class="flex items-center justify-end gap-4">
                        @auth
                            <a
                                href="{{ url('/dashboard') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                            >
                                Dashboard
                            </a>
                        @else
                            <a
                                href="{{ route('login') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                            >
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                                >
                                    Register
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </header>

        <!-- Hero Section -->
        <main class="flex-1 flex flex-col items-center justify-center text-center px-4 mt-10 lg:mt-0">
            
            <!-- Badge -->
            <div class="mb-6 animate-fade-in-up">
                <span class="inline-flex items-center gap-x-1.5 rounded-full px-3 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-200 dark:text-gray-300 dark:ring-gray-700 bg-white/50 dark:bg-white/5 backdrop-blur-sm">
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                    v2.0 Now Available
                </span>
            </div>

            <!-- Main Headline -->
            <h1 class="text-5xl md:text-7xl font-bold tracking-tight max-w-4xl mb-6 bg-clip-text text-transparent bg-gradient-to-b from-black to-gray-600 dark:from-white dark:to-gray-400">
                Organize your work,<br/> amplify your impact.
            </h1>

            <!-- Subtext -->
            <p class="text-lg md:text-xl text-gray-600 dark:text-gray-400 max-w-2xl mb-10 leading-relaxed">
                The simple, powerful task management system designed for individuals and teams who want to ship faster.
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto mb-16">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="px-8 py-3 bg-[#1b1b18] dark:bg-[#EDEDEC] text-white dark:text-black font-medium rounded-md hover:opacity-90 transition-opacity shadow-lg shadow-gray-200/50 dark:shadow-none">
                        Start for free
                    </a>
                @endif
                <a href="#features" class="px-8 py-3 bg-white dark:bg-white/5 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white font-medium rounded-md hover:bg-gray-50 dark:hover:bg-white/10 transition-colors">
                    Learn more
                </a>
            </div>

            <!-- Mock Interface (Pure CSS/HTML representation) -->
            <div class="w-full max-w-5xl mx-auto perspective-1000">
                <div class="relative rounded-xl bg-white dark:bg-[#161615] border border-gray-200 dark:border-[#3E3E3A] shadow-2xl p-2 md:p-4 transform rotate-x-12 hover:rotate-0 transition-transform duration-700 ease-out">
                    <!-- Fake Browser Header -->
                    <div class="flex items-center gap-2 mb-4 border-b border-gray-100 dark:border-[#3E3E3A] pb-3 px-2">
                        <div class="flex gap-1.5">
                            <div class="w-3 h-3 rounded-full bg-red-400"></div>
                            <div class="w-3 h-3 rounded-full bg-amber-400"></div>
                            <div class="w-3 h-3 rounded-full bg-green-400"></div>
                        </div>
                        <div class="ml-4 h-4 w-64 bg-gray-100 dark:bg-[#2C2C2A] rounded-full text-[10px] flex items-center px-2 text-gray-400">tasksystem.app/board</div>
                    </div>

                    <!-- Fake Kanban Board -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-left">
                        <!-- Column 1 -->
                        <div class="bg-gray-50 dark:bg-[#1C1C1A] p-3 rounded-lg">
                            <div class="flex justify-between mb-3">
                                <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">To Do</span>
                                <span class="text-xs bg-gray-200 dark:bg-[#3E3E3A] px-1.5 rounded">3</span>
                            </div>
                            <div class="space-y-2">
                                <div class="bg-white dark:bg-[#2C2C2A] p-3 rounded shadow-sm border border-gray-100 dark:border-[#3E3E3A]">
                                    <div class="h-2 w-12 bg-blue-100 text-blue-600 rounded-full mb-2"></div>
                                    <p class="text-sm font-medium mb-1">Research competitors</p>
                                </div>
                                <div class="bg-white dark:bg-[#2C2C2A] p-3 rounded shadow-sm border border-gray-100 dark:border-[#3E3E3A]">
                                    <div class="h-2 w-12 bg-purple-100 text-purple-600 rounded-full mb-2"></div>
                                    <p class="text-sm font-medium mb-1">Draft Q4 Report</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Column 2 -->
                        <div class="bg-gray-50 dark:bg-[#1C1C1A] p-3 rounded-lg hidden md:block">
                            <div class="flex justify-between mb-3">
                                <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">In Progress</span>
                                <span class="text-xs bg-gray-200 dark:bg-[#3E3E3A] px-1.5 rounded">1</span>
                            </div>
                            <div class="space-y-2">
                                <div class="bg-white dark:bg-[#2C2C2A] p-3 rounded shadow-sm border border-gray-100 dark:border-[#3E3E3A]">
                                    <div class="h-2 w-12 bg-amber-100 text-amber-600 rounded-full mb-2"></div>
                                    <p class="text-sm font-medium mb-1">Update Landing Page</p>
                                    <div class="mt-2 flex -space-x-1">
                                        <div class="h-5 w-5 rounded-full bg-gray-300 border border-white"></div>
                                        <div class="h-5 w-5 rounded-full bg-gray-400 border border-white"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Column 3 -->
                        <div class="bg-gray-50 dark:bg-[#1C1C1A] p-3 rounded-lg hidden md:block">
                            <div class="flex justify-between mb-3">
                                <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Done</span>
                                <span class="text-xs bg-gray-200 dark:bg-[#3E3E3A] px-1.5 rounded">5</span>
                            </div>
                             <div class="bg-white dark:bg-[#2C2C2A] p-3 rounded shadow-sm border border-gray-100 dark:border-[#3E3E3A] opacity-60">
                                    <div class="h-2 w-12 bg-green-100 text-green-600 rounded-full mb-2"></div>
                                    <p class="text-sm font-medium mb-1 line-through">Fix navigation bug</p>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="py-8 text-center text-sm text-gray-500 dark:text-gray-400">
            <p>&copy; {{ date('Y') }} TaskSystem. All rights reserved.</p>
            <p class="mt-2 text-xs">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </p>
        </footer>
    </div>
</body>
</html>
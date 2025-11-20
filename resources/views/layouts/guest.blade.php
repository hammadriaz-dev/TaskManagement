<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'TaskFlow') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* Custom Grid Background (Same as Welcome Page) */
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
    <body class="font-['Instrument_Sans'] text-[#1b1b18] dark:text-[#EDEDEC] antialiased">
        
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#FDFDFC] dark:bg-[#0a0a0a] relative selection:bg-[#FF2D20] selection:text-white">
            
            <!-- Background Grid -->
            <div class="absolute inset-0 h-full w-full bg-grid-pattern [mask-image:radial-gradient(ellipse_at_center,transparent_20%,black)] pointer-events-none"></div>

            <!-- Logo Area -->
            <div class="relative z-10 mb-6 flex flex-col items-center">
                <a href="/" class="flex items-center gap-2 group">
                    <div class="h-10 w-10 bg-black dark:bg-white rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white dark:text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                </a>
            </div>

            <!-- Card Container -->
            <div class="relative z-10 w-full sm:max-w-md px-6 py-8 bg-white dark:bg-[#161615] shadow-2xl shadow-gray-200/50 dark:shadow-none sm:rounded-xl border border-gray-200 dark:border-[#3E3E3A]">
                {{ $slot }}
            </div>
            
            <!-- Footer Text -->
            <div class="relative z-10 mt-6 text-center text-xs text-gray-500 dark:text-gray-400">
                &copy; {{ date('Y') }} TaskSystem. Secure access.
            </div>
        </div>
    </body>
</html>
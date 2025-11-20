<x-guest-layout>
    <!-- Header -->
    <div class="mb-6 text-center">
        <h2 class="text-xl font-bold tracking-tight text-[#1b1b18] dark:text-[#EDEDEC]">
            Welcome back
        </h2>
        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
            Please enter your details to sign in.
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="mb-1.5" />
            <x-text-input id="email" class="block mt-1 w-full bg-gray-50 border-gray-200 focus:ring-black dark:bg-[#0a0a0a] dark:border-[#3E3E3A] dark:focus:border-gray-500" 
                          type="email" name="email" :value="old('email')" required autofocus autocomplete="username" 
                          placeholder="name@company.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="mb-1.5" />
            
            <x-text-input id="password" class="block mt-1 w-full bg-gray-50 border-gray-200 focus:ring-black dark:bg-[#0a0a0a] dark:border-[#3E3E3A] dark:focus:border-gray-500"
                            type="password"
                            name="password"
                            required autocomplete="current-password" 
                            placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me & Forgot Password Row -->
        <div class="flex items-center justify-between mt-4">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-black shadow-sm focus:ring-black dark:bg-[#0a0a0a] dark:border-[#3E3E3A] dark:focus:ring-offset-[#161615]" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-500 hover:text-gray-900 dark:hover:text-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <x-primary-button class="w-full justify-center py-3 bg-[#1b1b18] hover:bg-black dark:bg-[#EDEDEC] dark:text-black dark:hover:bg-white transition-colors">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <!-- Register Link (Optional, good for UX) -->
        @if (Route::has('register'))
            <div class="mt-6 text-center text-sm text-gray-500 dark:text-gray-400">
                Don't have an account? 
                <a href="{{ route('register') }}" class="font-semibold text-gray-900 dark:text-white hover:underline">
                    Sign up
                </a>
            </div>
        @endif
    </form>
</x-guest-layout>
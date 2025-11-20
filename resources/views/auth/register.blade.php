<x-guest-layout>
    <!-- Header -->
    <div class="mb-6 text-center">
        <h2 class="text-xl font-bold tracking-tight text-[#1b1b18] dark:text-[#EDEDEC]">
            Create an account
        </h2>
        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
            Start organizing your tasks today.
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="mb-1.5" />
            <x-text-input id="name" class="block mt-1 w-full bg-gray-50 border-gray-200 focus:ring-black dark:bg-[#0a0a0a] dark:border-[#3E3E3A] dark:focus:border-gray-500" 
                          type="text" name="name" :value="old('name')" required autofocus autocomplete="name" 
                          placeholder="John Doe" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="mb-1.5" />
            <x-text-input id="email" class="block mt-1 w-full bg-gray-50 border-gray-200 focus:ring-black dark:bg-[#0a0a0a] dark:border-[#3E3E3A] dark:focus:border-gray-500" 
                          type="email" name="email" :value="old('email')" required autocomplete="username" 
                          placeholder="name@company.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="mb-1.5" />

            <x-text-input id="password" class="block mt-1 w-full bg-gray-50 border-gray-200 focus:ring-black dark:bg-[#0a0a0a] dark:border-[#3E3E3A] dark:focus:border-gray-500"
                            type="password"
                            name="password"
                            required autocomplete="new-password" 
                            placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="mb-1.5" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full bg-gray-50 border-gray-200 focus:ring-black dark:bg-[#0a0a0a] dark:border-[#3E3E3A] dark:focus:border-gray-500"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" 
                            placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <x-primary-button class="w-full justify-center py-3 bg-[#1b1b18] hover:bg-black dark:bg-[#EDEDEC] dark:text-black dark:hover:bg-white transition-colors">
                {{ __('Create account') }}
            </x-primary-button>
        </div>

        <!-- Login Link -->
        <div class="mt-6 text-center text-sm text-gray-500 dark:text-gray-400">
            Already have an account? 
            <a href="{{ route('login') }}" class="font-semibold text-gray-900 dark:text-white hover:underline">
                {{ __('Log in') }}
            </a>
        </div>
    </form>
</x-guest-layout>
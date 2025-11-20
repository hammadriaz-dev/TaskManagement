<div class="flex flex-col h-full">

    {{-- USER TOP INFO --}}
    <div class="p-5 text-center border-b border-gray-300">
        <div class="mx-auto h-12 w-12 rounded-full bg-gray-300 flex items-center justify-center text-gray-700">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        </div>

        <p class="font-semibold text-gray-700 mt-2">{{ Auth::user()->name }}</p>
        <p class="text-xs text-[#6F6AA4] capitalize">
            {{ Auth::user()->getRoleNames()->first() }}
        </p>
    </div>


    <nav class="flex-1 px-4 py-4 space-y-1">

        {{-- ADMIN MENU --}}
        @hasrole('admin')

            {{-- ADMIN - TASK MANAGEMENT --}}
            <a href="{{ route('admin.tasks.index') }}"
               class="flex items-center p-3 rounded-lg 
               {{ request()->routeIs('admin.tasks.*') ? 'bg-[#6F6AA4] text-white' : 'text-gray-700 hover:bg-[#d5dbec]' }}">
                <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/>
                </svg>
                Task Management
            </a>

            {{-- USER MANAGEMENT --}}
            <a href="{{ route('admin.users.index') }}"
               class="flex items-center p-3 rounded-lg 
               {{ request()->routeIs('admin.users.*') ? 'bg-[#6F6AA4] text-white' : 'text-gray-700 hover:bg-[#d5dbec]' }}">
                <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 20h5v-2a3 3 0 00-5.356-1.857"/>
                </svg>
                User Management
            </a>

        @elserole('user')

            {{-- USER - ONLY TASKS --}}
            <a href="{{ route('user.tasks.index') }}"
               class="flex items-center p-3 rounded-lg 
               {{ request()->routeIs('user.tasks.*') ? 'bg-[#6F6AA4] text-white' : 'text-gray-700 hover:bg-[#d5dbec]' }}">
                <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/>
                </svg>
                My Tasks
            </a>

        @endhasrole

    </nav>

    {{-- SETTINGS DROPDOWN (Bottom of Sidebar) --}}
    <div class="p-4 border-t border-gray-300 relative" x-data="{ open: false }">
        
        {{-- THE MENU (Hidden by default, appears above button) --}}
        <div x-show="open" 
             @click.outside="open = false"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-2"
             class="absolute bottom-full left-0 w-[calc(100%-2rem)] mx-4 mb-2 bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden z-50">

            {{-- Profile Link --}}
            <a href="{{ route('profile.edit') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 transition duration-150 ease-in-out">
                {{ __('Profile') }}
            </a>

            {{-- Logout Form --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); this.closest('form').submit();"
                   class="block px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition duration-150 ease-in-out">
                    {{ __('Log Out') }}
                </a>
            </form>
        </div>

        {{-- TRIGGER BUTTON --}}
        <button @click="open = !open" 
                class="flex items-center justify-between w-full p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition duration-150 ease-in-out focus:outline-none">
            <div class="flex items-center">
                <svg class="h-5 w-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>Settings</span>
            </div>
            
            {{-- Arrow Icon that rotates --}}
            <svg :class="{'rotate-180': open}" class="h-4 w-4 text-gray-400 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
            </svg>
        </button>
    </div>
    
</div>

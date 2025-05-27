<header class="flex justify-between items-center px-6 py-3 bg-white border-b border-gray-200 shadow-sm sticky top-0 z-50">
    <div class="flex items-center space-x-6">
        <!-- Notification Bell -->
        {{-- <div class="relative" x-data="{ notificationOpen: false }">
            <button @click="notificationOpen = !notificationOpen" 
                    class="p-2 text-gray-500 hover:text-yellow-500 transition-colors duration-200 rounded-full hover:bg-yellow-50 relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" 
                          d="M15 17h5l-1.405-1.405a2.032 2.032 0 01-.595-1.41V10a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v.341C8.67 5.165 7 7.388 7 10v4.185c0 .52-.214 1.025-.595 1.41L5 17h5m5 0a3.001 3.001 0 11-6 0m6 0H9" />
                </svg>
                <!-- Notification Badge -->
                <span class="absolute top-1 right-1 w-2.5 h-2.5 bg-yellow-500 border-2 border-white rounded-full animate-pulse"></span>
            </button>

            <!-- Notifications Dropdown -->
            <div x-show="notificationOpen"
                 @click.away="notificationOpen = false"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="transform opacity-0 scale-95"
                 x-transition:enter-end="transform opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="transform opacity-100 scale-100"
                 x-transition:leave-end="transform opacity-0 scale-95"
                 class="absolute right-0 mt-3 w-80 bg-white rounded-lg shadow-lg py-2 z-50 border border-gray-200">
                <div class="px-4 py-2 border-b border-gray-200">
                    <h3 class="text-sm font-semibold text-gray-900">Notifications</h3>
                </div>
                <div class="max-h-64 overflow-y-auto">
                    <!-- Sample Notifications -->
                    <a href="#" class="block px-4 py-3 hover:bg-gray-50 transition-colors duration-200">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-yellow-100">
                                    <svg class="h-4 w-4 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                </span>
                            </div>
                            <div class="ml-3 w-0 flex-1">
                                <p class="text-sm font-medium text-gray-900">New Event Available</p>
                                <p class="mt-1 text-sm text-gray-500">Check out the latest events and activities!</p>
                                <p class="mt-1 text-xs text-gray-400">2 hours ago</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="px-4 py-2 border-t border-gray-200 bg-gray-50">
                    <a href="#" class="text-sm text-yellow-600 hover:text-yellow-700 font-medium">View all notifications</a>
                </div>
            </div>
        </div> --}}
    </div>

    <!-- User Info with Dropdown -->
    <div class="relative" x-data="{ open: false }">
        <!-- User Info Button -->
        <button @click="open = !open" 
                class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-50 transition-colors duration-200">
            <div class="relative">
                <div class="w-10 h-10 rounded-full ring-2 ring-yellow-500 ring-offset-2 overflow-hidden">
                    @if(Auth::check() && Auth::user()->member)
                        <div class="w-full h-full rounded-full bg-yellow-50 flex items-center justify-center">
                            {!! Avatar::create(Auth::user()->member->name)->toSvg() !!}
                        </div>
                    @else
                        <div class="w-full h-full rounded-full bg-yellow-50 flex items-center justify-center">
                            {!! Avatar::create('Guest')->toSvg() !!}
                        </div>
                    @endif
                    <span class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-green-500 border-2 border-white rounded-full"></span>
                </div>
            </div>
            <div class="text-left hidden sm:block">
                <h2 class="text-sm font-semibold text-gray-800">
                    @if(Auth::check() && Auth::user()->member)
                        {{ Auth::user()->member->name }}
                    @else
                        Guest
                    @endif
                </h2>
                <p class="text-xs text-gray-500">
                    @if(Auth::check() && Auth::user()->member_id)
                        {{ Auth::user()->email }}
                    @else
                        Not logged in
                    @endif
                </p>
            </div>
            <!-- Dropdown Arrow -->
            <svg xmlns="http://www.w3.org/2000/svg" 
                 class="h-5 w-5 text-gray-400 transition-transform duration-200"
                 :class="{'rotate-180': open}"
                 viewBox="0 0 20 20" 
                 fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>

        <!-- Dropdown Menu -->
        <div x-show="open" 
             @click.away="open = false"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="transform opacity-0 scale-95"
             x-transition:enter-end="transform opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-75"
             x-transition:leave-start="transform opacity-100 scale-100"
             x-transition:leave-end="transform opacity-0 scale-95"
             class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg py-2 z-50 border border-gray-200">
            
            <!-- User Info Section -->
            <div class="px-4 py-3 border-b border-gray-200">
                <p class="text-sm font-medium text-gray-900">Signed in as</p>
                <p class="text-sm text-gray-500 truncate">{{ Auth::user()->email }}</p>
            </div>

            <!-- My Profile -->
            <a href="{{ route('member.setting') }}" 
               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span>My Profile</span>
                </div>
            </a>

            <!-- Account Settings -->
            <a href="{{ route('member.setting-personal') }}" 
               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Personal Information</span>
                </div>
            </a>

            <!-- Divider -->
            <hr class="my-2 border-gray-200">

            <!-- Log Out -->
            <form method="POST" action="{{ route('member.logout') }}">
                @csrf
                <button type="submit" 
                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors duration-200">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span>Log Out</span>
                    </div>
                </button>
            </form>
        </div>
    </div>
</header>

<!-- Alpine.js -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
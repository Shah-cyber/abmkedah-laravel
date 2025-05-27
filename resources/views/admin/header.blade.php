<!-- Admin Header -->
<header class="flex justify-between items-center px-6 py-3 bg-white border-b border-gray-200 shadow-sm sticky top-0 z-50">
    <div class="flex items-center space-x-6">
        <!-- Page Title - Can be dynamic -->
        <h1 class="text-xl font-semibold text-gray-800 hidden sm:block">
            @yield('page_title', 'Dashboard')
        </h1>
    </div>

    <div class="flex items-center space-x-4">
        <!-- Notification Bell -->
        <div class="relative" x-data="{ notificationOpen: false }">
            <button @click="notificationOpen = !notificationOpen" 
                    class="p-2 text-gray-500 hover:text-yellow-500 transition-colors duration-200 rounded-full hover:bg-yellow-50 relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" 
                          d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                </svg>
                @if(count($recentActivities ?? []) > 0)
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-yellow-500 rounded-full animate-pulse"></span>
                @endif
            </button>

            <!-- Notification Dropdown -->
            <div x-show="notificationOpen" 
                 @click.away="notificationOpen = false"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-100"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="absolute right-0 mt-3 w-96 bg-white rounded-lg shadow-xl py-2 z-50"
                 style="max-height: 90vh; overflow-y: auto;">
                
                <!-- Header -->
                <div class="px-4 py-2 border-b border-gray-100">
                    <div class="flex items-center justify-between">
                        <h3 class="text-sm font-semibold text-gray-900">Latest Notifications</h3>
                        @if(count($recentActivities ?? []) > 0)
                            <span class="px-2 py-1 text-xs font-medium text-yellow-600 bg-yellow-50 rounded-full">
                                {{ count($recentActivities) > 5 ? '5+' : count($recentActivities) }} new
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Notification List -->
                <div class="divide-y divide-gray-100" 
                     x-data="{ 
                        notifications: {{ json_encode($recentActivities ?? []) }},
                        clearNotifications() {
                            const total = this.notifications.length;
                            [...Array(total)].forEach((_, index) => {
                                setTimeout(() => {
                                    this.notifications.pop();
                                }, index * 200); // 200ms delay between each notification
                            });
                        }
                     }">
                    <template x-if="notifications.length > 0">
                        <div>
                            <template x-for="(activity, index) in notifications" :key="activity.id">
                                <div class="px-4 py-3 hover:bg-gray-50 transition-all duration-300 transform"
                                     x-transition:leave="transition ease-in-out duration-300"
                                     x-transition:leave-start="opacity-100 translate-x-0"
                                     x-transition:leave-end="opacity-0 translate-x-full"
                                     style="transform-origin: right">
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0">
                                            <template x-if="activity.type === 'event'">
                                                <div class="w-10 h-10 rounded-lg bg-yellow-100 flex items-center justify-center">
                                                    <svg class="w-6 h-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                            </template>
                                            <template x-if="activity.type === 'registration'">
                                                <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center">
                                                    <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                    </svg>
                                                </div>
                                            </template>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900" x-text="activity.details"></p>
                                            <div class="flex items-center space-x-2 mt-1">
                                                <span class="text-xs text-gray-500" 
                                                      x-text="new Date(activity.date).toLocaleString('en-GB', {
                                                          year: 'numeric',
                                                          month: '2-digit',
                                                          day: '2-digit',
                                                          hour: '2-digit',
                                                          minute: '2-digit',
                                                          second: '2-digit',
                                                          hour12: false
                                                      }).replace(',', '')"></span>
                                                <span class="text-xs px-2 py-0.5 rounded-full"
                                                      :class="{
                                                          'bg-green-100 text-green-800': activity.status === 'completed',
                                                          'bg-yellow-100 text-yellow-800': activity.status === 'running',
                                                          'bg-blue-100 text-blue-800': activity.status === 'active',
                                                          'bg-gray-100 text-gray-800': activity.status === 'draft',
                                                          'bg-gray-100 text-gray-800': !['completed', 'running', 'active', 'draft'].includes(activity.status)
                                                      }"
                                                      x-text="activity.status.charAt(0).toUpperCase() + activity.status.slice(1)"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>
                    <template x-if="notifications.length === 0">
                        <div class="px-4 py-8 text-center"
                             x-transition:enter="transition-opacity duration-300"
                             x-transition:enter-start="opacity-0"
                             x-transition:enter-end="opacity-100">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                            </svg>
                            <p class="mt-4 text-sm text-gray-500">No notifications yet</p>
                        </div>
                    </template>

                    <!-- Footer with Clear Button -->
                    <template x-if="notifications.length > 0">
                        <div class="px-4 py-2 border-t border-gray-100">
                            <button @click="clearNotifications()" 
                                    class="w-full px-4 py-2 text-sm text-red-600 hover:text-red-700 font-medium rounded-lg hover:bg-red-50 transition-colors duration-150 flex items-center justify-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                <span>Clear notifications</span>
                            </button>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <!-- User Profile Dropdown -->
        <div class="relative" x-data="{ profileOpen: false }">
            <button @click="profileOpen = !profileOpen" 
                    class="flex items-center space-x-3 hover:bg-gray-50 rounded-lg p-2 transition duration-150">
                <div class="relative w-10 h-10">
                    @if(Auth::check())
                        <div class="w-full h-full rounded-full bg-yellow-100 flex items-center justify-center overflow-hidden border-2 border-yellow-200">
                            {!! Avatar::create(Auth::user()->admin->name ?? Auth::user()->username)->toSvg() !!}
                        </div>
                        <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-400 border-2 border-white rounded-full"></div>
                    @endif
                </div>
                <div class="hidden sm:block text-left">
                    <h2 class="text-sm font-semibold text-gray-800">
                        {{ Auth::user()->username ?? 'Admin' }}
                    </h2>
                    <p class="text-xs text-gray-500">Administrator</p>
                </div>
                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>

            <!-- Profile Dropdown Menu -->
            <div x-show="profileOpen" 
                 @click.away="profileOpen = false"
                 x-transition:enter="transition ease-out duration-100"
                 x-transition:enter-start="transform opacity-0 scale-95"
                 x-transition:enter-end="transform opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="transform opacity-100 scale-100"
                 x-transition:leave-end="transform opacity-0 scale-95"
                 class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-1 z-50">
                
                <div class="px-4 py-2 border-b border-gray-100">
                    <p class="text-sm font-medium text-gray-900">Signed in as</p>
                    <p class="text-sm text-gray-500 truncate">{{ Auth::user()->email }}</p>
                </div>

                <!-- Navigation Links -->
                <div class="py-1">
                    <a href="{{ route('admin.settings.admins') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                        <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Settings
                    </a>
                </div>

                <!-- Logout -->
                <div class="py-1 border-t border-gray-100">
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="flex w-full items-center px-4 py-2 text-sm text-red-700 hover:bg-red-50">
                            <svg class="mr-3 h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Make sure to include Alpine.js in your layout -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<script>
    function clearNotifications() {
        // Show confirmation dialog
        Swal.fire({
            title: 'Clear All Notifications?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF4444',
            cancelButtonColor: '#6B7280',
            confirmButtonText: 'Yes, clear all',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Send request to clear notifications
                fetch('/admin/notifications/clear', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Close the notification dropdown
                        document.querySelector('[x-data="{ notificationOpen: false }"]').__x.$data.notificationOpen = false;
                        
                        // Show success message
                        Swal.fire({
                            title: 'Cleared!',
                            text: 'All notifications have been cleared.',
                            icon: 'success',
                            confirmButtonColor: '#EAB308'
                        }).then(() => {
                            // Reload the page to refresh the notifications
                            window.location.reload();
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Failed to clear notifications.',
                        icon: 'error',
                        confirmButtonColor: '#EAB308'
                    });
                });
            }
        });
    }
</script>
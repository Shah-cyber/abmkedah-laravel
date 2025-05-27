<x-member-layout>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Header Section -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Account Settings</h1>
                <p class="text-sm text-gray-600 mt-1">Manage your account preferences and security settings</p>
            </div>
        </div>
    </div>

    <!-- Tabs Section -->
    <div class="mb-6">
        <ul class="flex border-b">
            <!-- Account Tab -->
            <li class="mr-4">
                <a href="{{ route('member.setting') }}" 
                   class="inline-block py-2 px-4 {{ request()->routeIs('member.setting') ? 'text-yellow-500 border-b-2 border-yellow-500 font-semibold' : 'text-gray-600 hover:text-yellow-500 transition-colors duration-200' }}">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Account
                    </div>
                </a>
            </li>
            <!-- Personal Information Tab -->
            <li class="mr-4">
                <a href="{{ route('member.setting-personal') }}" 
                   class="inline-block py-2 px-4 {{ request()->routeIs('member.setting-personal') ? 'text-yellow-500 border-b-2 border-yellow-500 font-semibold' : 'text-gray-600 hover:text-yellow-500 transition-colors duration-200' }}">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Personal Information
                    </div>
                </a>
            </li>
        </ul>
    </div>
    
    <!-- Content Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Left Column: Account Details -->
        <div class="md:col-span-2 bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Account Details</h2>
                <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">Active</span>
            </div>
            <hr class="border-gray-200 mb-6">
            
            <form action="{{ route('member.updateAccount') }}" method="POST" id="account-details-form" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Username -->
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <input type="text" id="username" name="username" value="{{ $member->login->username }}"
                                class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200" />
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input type="email" id="email" name="email" value="{{ $member->login->email }}"
                                class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200" />
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="md:col-span-2">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input type="password" id="password" name="password" placeholder="Leave blank to keep current password"
                                class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200" />
                        </div>
                        <p class="mt-1 text-sm text-gray-500">Password must be at least 6 characters long</p>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Save Changes
                    </button>
                </div>
            </form>
        </div>

        <!-- Right Column: Profile Section -->
        <div class="bg-white shadow-md rounded-lg p-6 h-fit">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Profile</h2>
            <hr class="border-gray-200 mb-6">
            
            <!-- Avatar -->
            <div class="flex flex-col items-center">
                <div class="relative w-32 h-32 mb-4">
                    <div class="w-full h-full rounded-full bg-yellow-50 flex items-center justify-center border-2 border-yellow-200">
                        {!! Avatar::create($member->name)->toSvg() !!}
                    </div>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-1">{{ $member->name }}</h3>
                <p class="text-sm text-gray-500 mb-6">Member since {{ $member->created_at->format('F Y') }}</p>
            </div>

            <!-- Account Actions -->
            <div class="space-y-3">
                <button type="button" id="deactivate-account-btn"
                    class="w-full inline-flex items-center justify-center px-4 py-2 border border-red-300 text-red-700 hover:bg-red-50 rounded-lg transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </svg>
                    Deactivate Account
                </button>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('deactivate-account-btn').addEventListener('click', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "Your account will be deactivated. You can reactivate it by contacting support.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#EF4444',
                cancelButtonColor: '#3B82F6',
                confirmButtonText: '<span class="text-white">Yes, deactivate it!</span>',
                cancelButtonText: '<span class="text-white">No, keep it</span>',
                customClass: {
                    confirmButton: 'bg-red-500 hover:bg-red-600',
                    cancelButton: 'bg-blue-500 hover:bg-blue-600'
                },
                buttonsStyling: true
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('{{ route("member.deactivate") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                title: 'Account Deactivated',
                                text: data.message,
                                icon: 'success',
                                confirmButtonColor: '#3B82F6',
                                customClass: {
                                    confirmButton: 'bg-blue-500 hover:bg-blue-600'
                                }
                            }).then(() => {
                                window.location.href = data.redirect;
                            });
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: data.message,
                                icon: 'error',
                                confirmButtonColor: '#EF4444',
                                customClass: {
                                    confirmButton: 'bg-red-500 hover:bg-red-600'
                                }
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            title: 'Error',
                            text: 'An error occurred while deactivating your account.',
                            icon: 'error',
                            confirmButtonColor: '#EF4444',
                            customClass: {
                                confirmButton: 'bg-red-500 hover:bg-red-600'
                            }
                        });
                    });
                }
            });
        });
    </script>
    <script src="{{ asset('member/memberSetting-personal-information.js') }}"></script>
</x-member-layout>
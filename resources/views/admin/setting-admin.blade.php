<x-admin-layout>
    <!-- Header Section with Breadcrumb -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Admin Settings</h1>
                <p class="text-sm text-gray-600 mt-1">Manage your account settings and preferences</p>
            </div>
        </div>
    </div>

    <!-- Tabs Section -->
    <div class="bg-white rounded-lg shadow-sm mb-6">
        <div class="px-4 border-b border-gray-200">
            <nav class="-mb-px flex space-x-8">
                <a href="#" class="border-yellow-500 text-yellow-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Account Settings
                </a>
                <a href="{{ route('admin.setting.users') }}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    User Management
                </a>
            </nav>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Left Column: Account Details -->
        <div class="md:col-span-2">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Account Information</h2>
                    
                    <form action="{{ route('admin.setting.users.update.put', ['id' => Auth::user()->admin->admin_id]) }}" 
                          method="POST" 
                          class="space-y-6"
                          id="accountUpdateForm">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Username -->
                            <div>
                                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" 
                                           id="username" 
                                           name="username" 
                                           value="{{ Auth::user()->username }}"
                                           class="pl-10 w-full rounded-lg border-gray-300 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200" />
                                </div>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                        </svg>
                                    </div>
                                    <input type="email" 
                                           id="email" 
                                           name="email" 
                                           value="{{ Auth::user()->email }}"
                                           class="pl-10 w-full rounded-lg border-gray-300 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200" />
                                </div>
                            </div>

                            <!-- New Password -->
                            <div>
                                <label for="new-password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="password" 
                                           id="new-password" 
                                           name="password"
                                           placeholder="Leave blank to keep current"
                                           class="pl-10 w-full rounded-lg border-gray-300 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200" />
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label for="confirm-password" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="password" 
                                           id="confirm-password" 
                                           placeholder="Confirm new password"
                                           class="pl-10 w-full rounded-lg border-gray-300 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200" />
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-end space-x-3 pt-6 border-t border-gray-100">
                            <button type="reset" 
                                    class="px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors duration-200">
                                Reset
                            </button>
                            <button type="submit"
                                    class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg transition-colors duration-200 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Right Column: Profile Section -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Profile</h2>
                
                <!-- Avatar -->
                <div class="text-center mb-6">
                    <div class="relative inline-block">
                        <div class="w-24 h-24 rounded-full bg-yellow-50 border-2 border-yellow-200 flex items-center justify-center overflow-hidden">
                            {!! Avatar::create(Auth::user()->admin->name ?? Auth::user()->username)->toSvg() !!}
                        </div>
                    </div>
                    <h3 class="mt-4 font-medium text-gray-900">{{ Auth::user()->username }}</h3>
                    <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                </div>

                <!-- Account Actions -->
                <div class="space-y-3">
                    <!-- Log Out Button -->
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="w-full px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors duration-200 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden Messages for SweetAlert -->
    @if(session('success'))
        <div id="success-message" class="hidden">{{ session('success') }}</div>
    @endif
    
    @if($errors->any())
        <div id="error-message" class="hidden">{{ implode(', ', $errors->all()) }}</div>
    @endif

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Form submission handler
            const accountForm = document.getElementById('accountUpdateForm');
            if (accountForm) {
                accountForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    // Password validation
                    const newPassword = document.getElementById('new-password').value;
                    const confirmPassword = document.getElementById('confirm-password').value;
                    
                    if (newPassword && newPassword !== confirmPassword) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Password Mismatch',
                            text: 'The passwords you entered do not match.',
                            confirmButtonColor: '#EAB308'
                        });
                        return;
                    }

                    // Confirm changes
                    Swal.fire({
                        title: 'Save Changes?',
                        text: 'Are you sure you want to update your account settings?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#EAB308',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, save changes'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                        }
                    });
                });
            }

            // Success message
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: successMessage.textContent,
                    confirmButtonColor: '#EAB308'
                });
            }

            // Error message
            const errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: errorMessage.textContent,
                    confirmButtonColor: '#EAB308'
                });
            }
        });
    </script>
</x-admin-layout>
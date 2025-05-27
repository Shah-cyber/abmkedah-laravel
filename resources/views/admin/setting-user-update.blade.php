<x-admin-layout>
    <!-- Header Section with Breadcrumb -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{ route('admin.setting.users') }}" 
                   class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <div class="ml-4">
                    <h1 class="text-2xl font-bold text-gray-800">Update User</h1>
                    <p class="text-sm text-gray-600 mt-1">Modify user account settings</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Left Column: Form Section -->
        <div class="md:col-span-2">
            <div class="bg-white rounded-lg shadow-sm">
                <div class="p-6">
                    <form id="userUpdateForm" 
                          data-user-id="{{ $userType === 'admin' ? $userData->admin_id : $userData->member_id }}"
                          data-user-type="{{ $userType }}" 
                          class="space-y-6">
                        @csrf
                        
                        <!-- Account Information Section -->
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800 mb-4">Account Information</h2>
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
                                               value="{{ $login->username }}"
                                               required
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
                                               value="{{ $login->email }}"
                                               required
                                               class="pl-10 w-full rounded-lg border-gray-300 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200" />
                                    </div>
                                </div>

                                <!-- Role -->
                                <div>
                                    <label for="select-role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                                    <div class="relative">
                                        <select id="select-role" 
                                                name="select-role" 
                                                class="w-full rounded-lg border-gray-300 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200"
                                                {{ $userType === 'member' ? 'disabled' : '' }}>
                                            @if($userType === 'admin')
                                                <option value="super-admin" {{ $userData->role === 'super-admin' ? 'selected' : '' }}>Super Admin</option>
                                                <option value="sub-admin" {{ $userData->role === 'sub-admin' ? 'selected' : '' }}>Sub Admin</option>
                                            @else
                                                <option value="member" selected>Member</option>
                                            @endif
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- Status -->
                                <div>
                                    <label for="select-status" class="block text-sm font-medium text-gray-700 mb-1">Account Status</label>
                                    <div class="relative">
                                        <select id="select-status" 
                                                name="select-status"
                                                class="w-full rounded-lg border-gray-300 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200">
                                            <option value="active" {{ $login->acc_status === 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="deactivate" {{ $login->acc_status === 'deactivate' ? 'selected' : '' }}>Deactivate</option>
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Security Section -->
                        <div class="pt-6 border-t border-gray-200">
                            <h2 class="text-lg font-semibold text-gray-800 mb-4">Security</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
                                               name="new-password"
                                               class="pl-10 w-full rounded-lg border-gray-300 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200"
                                               placeholder="Leave blank to keep current" />
                                    </div>
                                </div>

                                <!-- Confirm Password -->
                                <div>
                                    <label for="confirm-password" class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <input type="password" 
                                               id="confirm-password" 
                                               name="confirm-password"
                                               class="pl-10 w-full rounded-lg border-gray-300 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200"
                                               placeholder="Confirm new password" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                            <button type="reset" 
                                    class="px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors duration-200">
                                Reset Changes
                            </button>
                            <button type="submit"
                                    class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg transition-colors duration-200 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Right Column: User Profile Card -->
        <div class="bg-white rounded-lg shadow-sm">
            <div class="p-6">
                <div class="text-center">
                    <div class="relative inline-block">
                        <div class="w-24 h-24 rounded-full bg-yellow-50 border-2 border-yellow-200 flex items-center justify-center overflow-hidden">
                            {!! Avatar::create($login->username)->toSvg() !!}
                        </div>
                    </div>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">{{ $login->username }}</h3>
                    <p class="text-sm text-gray-500">{{ $login->email }}</p>
                    
                    <!-- Status Badge -->
                    <div class="mt-4">
                        @if($login->acc_status == 'active')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                <div class="w-1.5 h-1.5 mr-2 rounded-full bg-green-500"></div>
                                Active Account
                            </span>
                        @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                <div class="w-1.5 h-1.5 mr-2 rounded-full bg-red-500"></div>
                                Inactive Account
                            </span>
                        @endif
                    </div>

                    <!-- Role Badge -->
                    <div class="mt-2">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $userType === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ $userType === 'admin' ? $userData->role : 'Member' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admin/AdminUserSettings.js') }}"></script>
</x-admin-layout>
<x-admin-layout>
    <!-- Header Section -->
    <div class="mb-4 flex items-center">
        <!-- Icon Back Button -->
        <a href="{{ route('admin.setting.users') }}" class="text-gray-600 hover:text-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <!-- Title -->
        <h1 class="ml-4 text-2xl font-bold text-gray-800">Update User</h1>
    </div>
    <!-- Horizontal Line -->
    <hr class="border-gray-300 my-2">

      <!-- Form -->
      <div class="mt-4 px-6 py-4 bg-white shadow-lg rounded-lg">
        <form id="userUpdateForm" 
              data-user-id="{{ $userType === 'admin' ? $userData->admin_id : $userData->member_id }}"
              data-user-type="{{ $userType }}" 
              class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username" 
                           value="{{ $login->username }}"
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" 
                           value="{{ $login->email }}"
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- New Password -->
                <div>
                    <label for="new-password" class="block text-sm font-medium text-gray-700">New Password</label>
                    <input type="password" id="new-password" name="new-password"
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm-password"
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- Status -->
                <div>
                    <label for="select-status" class="block text-sm font-medium text-gray-700">Select Status</label>
                    <select id="select-status" name="select-status"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="active" {{ $login->acc_status === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="deactivate" {{ $login->acc_status === 'deactivate' ? 'selected' : '' }}>Deactivate</option>
                    </select>
                </div>

                <!-- Role -->
                <div>
                    <label for="select-role" class="block text-sm font-medium text-gray-700">Select Role</label>
                    <select id="select-role" name="select-role"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @if($userType === 'admin')
                            <option value="super-admin" {{ $userData->role === 'super-admin' ? 'selected' : '' }}>Super Admin</option>
                            <option value="sub-admin" {{ $userData->role === 'sub-admin' ? 'selected' : '' }}>Sub Admin</option>
                        @else
                            <option value="member" selected>Member</option>
                        @endif
                    </select>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-right">
                <button type="submit"
                        class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Update User
                </button>
            </div>
        </form>
    </div>

    <!-- Include SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Include your custom JS -->
    <script src="{{ asset('admin/AdminUserSettings.js') }}"></script>
</x-admin-layout>
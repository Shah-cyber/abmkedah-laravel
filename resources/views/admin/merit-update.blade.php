<x-admin-layout>
    <!-- Header Section -->
    <div class="mb-4 flex items-center">
        <!-- Icon Back Button -->
        <a href="/admin/achievement-merit" class="text-gray-600 hover:text-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <!-- Title -->
        <h1 class="ml-4 text-2xl font-bold text-gray-800">Update Merit</h1>
    </div>
    <!-- Horizontal Line -->
    <hr class="border-gray-300 my-2">

    <!-- Form -->
    <div class="mt-4 px-6 py-4 bg-white shadow-lg rounded-lg">
        <form id="update-merit-form" action="{{ route('merit.update', $merit->merit_id) }}" method="POST" class="space-y-4">
            @csrf
            @method('POST') <!-- Use POST for updating -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- Select Event -->
                <div>
                    <label for="event_id" class="block text-sm font-medium text-gray-700">Select Event</label>
                    <select
                        id="event_id"
                        name="event_id"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required disabled>
                        <option value="" selected>Choose</option>
                        @foreach ($events as $event)
                            <option value="{{ $event->event_id }}" {{ $event->event_id == $merit->event_id ? 'selected' : '' }}>{{ $event->event_name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Merit Point -->
                <div>
                    <label for="merit_point" class="block text-sm font-medium text-gray-700">Merit Point</label>
                    <input
                        type="number"
                        id="merit_point"
                        name="merit_point"
                        step="0.01"
                        value="{{ old('merit_point', $merit->merit_point) }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        {{ auth()->user()->admin_id == $merit->admin_id ? '' : 'readonly' }} required />
                </div>

                <!-- Person In Charge -->
                <div>
                    <label for="admin_id" class="block text-sm font-medium text-gray-700">Person In Charge</label>
                    <select
                        id="admin_id"
                        name="admin_id"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required {{ auth()->user()->admin_id == $merit->admin_id ? '' : 'disabled' }}>
                        <option value="" selected>Choose Admin</option>
                        @foreach ($admins as $admin)
                            <option value="{{ $admin->admin_id }}" {{ $admin->admin_id == $merit->admin_id ? 'selected' : '' }}>
                                {{ $admin->login->username ?? 'N/A' }} (ID: {{ $admin->admin_id }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Phone Number -->
                <div>
                    <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input
                        type="text"
                        id="phone_number"
                        name="phone_number"
                        value="{{ old('phone_number', $merit->admin->phone_number ?? '') }}"  
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" readonly />
                </div>
            </div>

            <!-- Submit Button -->
            @if (auth()->user()->admin_id == $merit->admin_id)
                <div class="text-right">
                    <button
                        type="submit"
                        class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Update Merit
                    </button>
                </div>
            @endif
        </form>

        <!-- Hidden Success and Error Messages -->
        @if(session('success'))
            <div id="success-message" style="display: none;">{{ session('success') }}</div>
        @endif
        
        @if($errors->any())
            <div id="error-message" style="display: none;">{{ implode(', ', $errors->all()) }}</div>
        @endif
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom JS for Merit -->
    <script src="{{ asset('admin/adminMerit.js') }}"></script>

    <script>
        // Update phone number based on selected admin
        document.getElementById('admin_id').addEventListener('change', function() {
            const selectedAdminId = this.value;
            const selectedAdmin = @json($admins); // Pass the admin data to JavaScript

            const phoneNumberField = document.getElementById('phone_number');
            const selected = selectedAdmin.find(admin => admin.admin_id == selectedAdminId);

            if (selected) {
                phoneNumberField.value = selected.phone_number; // Update phone number field
            } else {
                phoneNumberField.value = ''; // Clear the field if no admin is selected
            }
        });
    </script>
</x-admin-layout>
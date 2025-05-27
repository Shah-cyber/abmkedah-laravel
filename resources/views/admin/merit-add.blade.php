<x-admin-layout>
    <!-- Header Section with Breadcrumb -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="/admin/achievement-merit" 
                   class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <div class="ml-4">
                    <h1 class="text-2xl font-bold text-gray-800">Add Merit Points</h1>
                    <p class="text-sm text-gray-600 mt-1">Allocate merit points to event participants</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="p-6">
            <form id="add-merit-form" action="{{ route('merit.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Select Event -->
                    <div>
                        <label for="event_id" class="block text-sm font-medium text-gray-700 mb-1">Event Name</label>
                        <select id="event_id" name="event_id" 
                                class="w-full rounded-lg border-gray-300 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200" 
                                required>
                            <option value="">Select an event</option>
                            @foreach ($events as $event)
                                <option value="{{ $event->event_id }}">{{ $event->event_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Merit Points -->
                    <div>
                        <label for="merit_point" class="block text-sm font-medium text-gray-700 mb-1">Merit Points</label>
                        <div class="relative">
                            <input type="number" id="merit_point" name="merit_point" step="0.01"
                                   class="w-full rounded-lg border-gray-300 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200 pl-7" 
                                   required>
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Person In Charge -->
                    <div>
                        <label for="admin_id" class="block text-sm font-medium text-gray-700 mb-1">Person In Charge</label>
                        <select id="admin_id" name="admin_id" 
                                class="w-full rounded-lg border-gray-300 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200" 
                                required>
                            <option value="">Select admin</option>
                            @foreach ($admins as $admin)
                                <option value="{{ $admin->admin_id }}">{{ $admin->login->username ?? 'N/A' }} (ID: {{ $admin->admin_id }})</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Phone Number -->
                    <div>
                        <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                        <div class="relative">
                            <input type="text" id="phone_number" name="phone_number"
                                   class="w-full rounded-lg bg-gray-50 border-gray-300 text-gray-500 pl-7" 
                                   disabled>
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-3 mt-6 pt-6 border-t border-gray-100">
                    <a href="/admin/achievement-merit" 
                       class="px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors duration-200">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg transition-colors duration-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Add Merit Points
                    </button>
                </div>
            </form>
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
        document.addEventListener('DOMContentLoaded', function () {
            // Admin selection handler
            document.getElementById('admin_id').addEventListener('change', function() {
                const selectedAdminId = this.value;
                const admins = @json($admins);
                const phoneNumberField = document.getElementById('phone_number');
                
                const selectedAdmin = admins.find(admin => admin.admin_id == selectedAdminId);
                phoneNumberField.value = selectedAdmin ? selectedAdmin.phone_number : '';
            });

            // Form submission handler
            document.getElementById('add-merit-form').addEventListener('submit', function(e) {
                e.preventDefault();
                
                Swal.fire({
                    title: 'Confirm Merit Points',
                    text: 'Are you sure you want to allocate these merit points?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#EAB308',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, allocate points'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });

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
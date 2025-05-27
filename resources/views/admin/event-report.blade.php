<x-admin-layout>
    <!-- Header Section -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="/admin/event-record" 
                   class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <div class="ml-4">
                    <h1 class="text-2xl font-bold text-gray-800">Event Report</h1>
                    <p class="text-sm text-gray-600 mt-1">View event details and manage participants</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Event Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Event Name Card -->
        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Event Name</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $event->event_name }}</p>
                </div>
            </div>
        </div>

        <!-- Event Date Card -->
        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Event Date</p>
                    <p class="text-lg font-semibold text-gray-900">{{ \Carbon\Carbon::parse($event->event_date)->format('d/m/Y') }}</p>
                </div>
            </div>
        </div>

        <!-- Session Card -->
        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Session</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $event->event_session }}</p>
                </div>
            </div>
        </div>

        <!-- Participants Card -->
        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Participants</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $totalParticipants }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Actions Section -->
    <div class="flex flex-col md:flex-row gap-4 mb-6">
        <!-- Search Box -->
        <div class="flex-1">
            <div class="relative">
                <input id="search-input" type="text" 
                       class="w-full px-4 py-2 pl-10 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200" 
                       placeholder="Search participants...">
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" 
                     fill="none" 
                     viewBox="0 0 24 24" 
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex gap-4">
            <button type="button" onclick="generatePDF()"
                    class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                Generate Report
            </button>
            <button type="button" onclick="submitSelected()"
                    class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                </svg>
                Allocate Merit
            </button>
        </div>
    </div>

    <!-- Participants Table -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Volunteer Name</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Phone Number</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Member Status</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Allocate Merit</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($participants as $index => $participant)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">
                                    @if ($participant->member)
                                        {{ $participant->member->name }}
                                    @elseif ($participant->nonmember)
                                        {{ $participant->nonmember->name }}
                                    @else
                                        N/A
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    @if ($participant->member)
                                        {{ $participant->member->phone_number }}
                                    @elseif ($participant->nonmember)
                                        {{ $participant->nonmember->phone_number }}
                                    @else
                                        N/A
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if ($participant->member)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        {{ $participant->member->member_status }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        Public
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                @php
                                    $isAllocated = false;
                                    $isPublic = !$participant->member;
                                    
                                    if ($participant->member) {
                                        $isAllocated = \App\Models\AllocatedMerit::where([
                                            'member_id' => $participant->member->member_id,
                                            'event_id' => $event->event_id
                                        ])->exists();
                                    }
                                @endphp
                                
                                <div class="flex justify-center">
                                    <input type="checkbox" 
                                        name="allocate-merit" 
                                        value="{{ $participant->member ? $participant->member->member_id : '' }}" 
                                        class="{{ $isPublic ? 'cursor-not-allowed' : 'allocate-checkbox' }} w-5 h-5 text-yellow-600 border-gray-300 rounded focus:ring-yellow-500 transition-colors duration-200"
                                        {{ $isPublic ? 'disabled' : '' }}
                                        {{ $isAllocated ? 'checked disabled' : '' }}
                                        {{ $isPublic ? 'title="Merit allocation is only available for members"' : '' }}>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="bg-white px-6 py-4 border-t border-gray-200">
            <div class="flex justify-between items-center">
                <p class="text-sm text-gray-600">
                    Showing {{ count($participants) }} entries
                </p>
                <div class="flex items-center space-x-1">
                    <button disabled
                            class="px-3 py-1 text-sm text-gray-500 bg-gray-100 rounded-md cursor-not-allowed">
                        Previous
                    </button>

                    <button class="px-3 py-1 text-sm text-white bg-yellow-500 rounded-md">
                        1
                    </button>

                    <button disabled
                            class="px-3 py-1 text-sm text-gray-500 bg-gray-100 rounded-md cursor-not-allowed">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admin/adminEvent.js') }}"></script>

    <script>
        // PDF Generation
        function generatePDF() {
            Swal.fire({
                title: 'Generating Report',
                text: 'Please wait while we generate your PDF...',
                icon: 'info',
                showConfirmButton: false,
                allowOutsideClick: false
            });

            // Replace with actual PDF generation logic
            setTimeout(() => {
                Swal.fire({
                    title: 'Success!',
                    text: 'Report has been generated successfully.',
                    icon: 'success'
                });
            }, 2000);
        }

        // Search Functionality
        document.getElementById('search-input').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });

        // Merit Allocation
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.allocate-checkbox').forEach(checkbox => {
                if (!checkbox.hasAttribute('disabled')) {
                    checkbox.disabled = false;
                }
            });
        });

        function submitSelected() {
            const checkboxes = document.querySelectorAll('.allocate-checkbox:not([disabled])');
            const selected = [];
            const eventId = "{{ $event->event_id }}";
            
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    selected.push(checkbox.value);
                }
            });
    
            if (selected.length === 0) {
                Swal.fire({
                    title: "No participants selected",
                    text: "Please select at least one member to allocate merit points.",
                    icon: "warning"
                });
                return;
            }
    
            Swal.fire({
                title: 'Allocate Merit Points',
                text: "Are you sure you want to allocate merit points to the selected members?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#EAB308',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, allocate points!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.merit.allocate') }}",
                        type: "POST",
                        data: {
                            event_id: eventId,
                            member_ids: selected,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: "Success!",
                                    text: response.message,
                                    icon: "success",
                                    confirmButtonColor: '#EAB308'
                                });
                                
                                checkboxes.forEach(checkbox => {
                                    if (checkbox.checked) {
                                        checkbox.checked = false;
                                        checkbox.disabled = true;
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: "Error!",
                                    text: response.message,
                                    icon: "error",
                                    confirmButtonColor: '#EAB308'
                                });
                            }
                        },
                        error: function(xhr) {
                            let errorMessage = "An error occurred while allocating merit points.";
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMessage = xhr.responseJSON.message;
                            }
                            Swal.fire({
                                title: "Error!",
                                text: errorMessage,
                                icon: "error",
                                confirmButtonColor: '#EAB308'
                            });
                        }
                    });
                }
            });
        }
    </script>
</x-admin-layout>
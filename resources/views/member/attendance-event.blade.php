@php
    use Carbon\Carbon;
@endphp
<x-member-layout>
    <style>
        .swal-btn {
            @apply bg-blue-600 text-white rounded-lg px-6 py-2.5 font-medium transition-all duration-200 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200;
        }

        .swal-btn-cancel {
            @apply bg-red-600 text-white rounded-lg px-6 py-2.5 font-medium transition-all duration-200 hover:bg-red-700 focus:ring-4 focus:ring-red-200;
        }

        .swal2-actions {
            @apply flex justify-between gap-4;
        }

        button.disabled {
            @apply opacity-50 cursor-not-allowed pointer-events-none;
        }

        .search-input:focus + .search-icon {
            @apply text-blue-500;
        }
    </style>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <div class="p-6 space-y-6">
        <!-- Header Section with Stats -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Event Attendance</h1>
                    <p class="text-gray-500 mt-1">Track and manage your event attendance</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="bg-blue-50 text-blue-600 px-4 py-2 rounded-lg flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="font-medium">Total Events: {{ count($attendanceEvents) }}</span>
                    </div>
                    <div class="bg-green-50 text-green-600 px-4 py-2 rounded-lg flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="font-medium">Attended: {{ $attendanceEvents->where('has_attended', 1)->count() }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Info Section -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <!-- Search Input -->
                <div class="relative flex-1">
                    <input
                        type="text"
                        class="search-input w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                        placeholder="Search events by name or date..." />
                    <svg class="search-icon absolute left-4 top-3.5 h-5 w-5 text-gray-400 transition-colors duration-200"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <!-- Info Badge -->
                <div class="bg-yellow-50 text-yellow-700 px-4 py-2 rounded-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm">Merit points are awarded upon attendance confirmation</span>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                            <th scope="col" class="px-6 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">Event Details</th>
                            <th scope="col" class="px-6 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">Schedule</th>
                            <th scope="col" class="px-6 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider ">Attendance</th>
                            <th scope="col" class="px-6 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @php
                            $today = Carbon::today();
                            $now = Carbon::now();
                        @endphp
                        @forelse($attendanceEvents as $index => $event)
                            @php
                                $eventDate = Carbon::parse($event->event_date);
                                $startTime = Carbon::parse($event->event_start_time);
                                $endTime = Carbon::parse($event->event_end_time);
                            @endphp
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $index + 1 }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $event->event_name }}</div>
                                    {{-- <div class="text-sm text-gray-500">Event ID: #{{ $event->join_event_id }}</div> --}}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $eventDate->format('d M Y') }}</div>
                                    <div class="text-sm text-gray-500">
                                        {{ $startTime->format('h:i A') }} - {{ $endTime->format('h:i A') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @if ($event->has_attended == 0)
                                        @if ($eventDate->isToday() && $now->between($startTime, $endTime))
                                            <form id="attendanceForm" method="POST" action="{{ route('member.submitAttendance') }}" 
                                                  class="flex flex-col items-center space-y-2">
                                                @csrf
                                                <input type="hidden" name="join_event_id" value="{{ $event->join_event_id }}">
                                                <label class="inline-flex items-center cursor-pointer">
                                                    <input name="confirm_attendance" type="checkbox"
                                                        class="form-checkbox h-5 w-5 text-blue-600 rounded border-gray-300 focus:ring-blue-500" required />
                                                    <span class="ml-2 text-sm text-gray-600">Confirm</span>
                                                </label>
                                                <button type="submit"
                                                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    Submit
                                                </button>
                                            </form>
                                        @elseif ($eventDate->isToday() && $now->gt($endTime) || $eventDate->lt($today))
                                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-red-100">
                                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-600">
                                                Coming Soon
                                            </span>
                                        @endif
                                    @elseif ($event->has_attended == 1)
                                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-green-100">
                                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $statusConfig = [
                                            'running' => [
                                                'class' => 'bg-green-100 text-green-700',
                                                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />'
                                            ],
                                            'Coming Soon' => [
                                                'class' => 'bg-blue-100 text-blue-700',
                                                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />'
                                            ],
                                            'Expired' => [
                                                'class' => 'bg-red-100 text-red-700',
                                                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />'
                                            ]
                                        ];
                                        $config = $statusConfig[$event->status] ?? [
                                            'class' => 'bg-gray-100 text-gray-700',
                                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />'
                                        ];
                                    @endphp
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $config['class'] }}">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            {!! $config['icon'] !!}
                                        </svg>
                                        {{ $event->status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                        <p class="text-gray-500 text-lg font-medium">No attendance records found</p>
                                        <p class="text-gray-400 text-sm mt-1">Join some events to see them here</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        // Search functionality
        const searchInput = document.querySelector('.search-input');
        if (searchInput) {
            searchInput.addEventListener('input', (e) => {
                const searchTerm = e.target.value.toLowerCase();
                const rows = document.querySelectorAll('tbody tr');
                
                rows.forEach(row => {
                    const eventName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                    const eventDate = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                    const matches = eventName.includes(searchTerm) || eventDate.includes(searchTerm);
                    row.style.display = matches ? '' : 'none';
                });
            });
        }

        // Attendance form handling
        const form = document.getElementById('attendanceForm');
        if (form) {
            form.addEventListener('submit', async (event) => {
                event.preventDefault();

                // Show loading state
                Swal.fire({
                    title: 'Submitting Attendance',
                    html: 'Please wait while we process your attendance...',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                try {
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
                    const formData = new FormData(form);
                    const response = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(Object.fromEntries(formData.entries()))
                    });

                    const data = await response.json();

                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Attendance Confirmed!',
                            text: data.message || 'Your attendance has been successfully recorded.',
                            confirmButtonText: 'Continue',
                            customClass: {
                                confirmButton: 'swal-btn'
                            }
                        }).then(() => {
                            window.location.reload();
                        });
                    } else {
                        throw new Error(data.message || 'Failed to submit attendance');
                    }
                } catch (error) {
                    console.error('Attendance submission error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: error.message || 'Something went wrong while submitting your attendance.',
                        confirmButtonText: 'Try Again',
                        customClass: {
                            confirmButton: 'swal-btn'
                        }
                    });
                }
            });
        }
    });
    </script>
</x-member-layout> 
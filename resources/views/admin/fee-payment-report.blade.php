<x-admin-layout>
    <!-- Header Section with improved styling -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex items-center">
            <a href="{{ route('admin.fee-payment.index') }}" 
               class="p-2 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div class="ml-4">
                <h1 class="text-2xl font-bold text-gray-800">Fee Payment Report</h1>
                <p class="text-sm text-gray-600 mt-1">Detailed payment information and statistics</p>
            </div>
        </div>
    </div>

    <!-- Summary Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <!-- Event Name Card -->
        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Event Name</p>
                    <p class="text-lg font-bold text-gray-900">{{ $event->event_name }}</p>
                </div>
            </div>
        </div>

        <!-- Event Fee Card -->
        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Event Fee</p>
                    <p class="text-lg font-bold text-gray-900">RM{{ number_format($event->event_price, 2) }}</p>
                </div>
            </div>
        </div>

        <!-- Total Collection Card -->
        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center">
                <div class="p-3 bg-yellow-100 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Collection</p>
                    <p class="text-lg font-bold text-gray-900">RM{{ number_format($totalCollection, 2) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Actions Section -->
    <div class="flex flex-col md:flex-row gap-4 mb-6">
        <!-- Search Box -->
        <div class="flex-1">
            <div class="relative">
                <input type="text"
                    id="searchInput"
                    class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200"
                    placeholder="Search by name or status...">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="absolute left-3 top-3.5 h-5 w-5 text-gray-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>

        <!-- Generate Report Button -->
        <div class="flex-none">
            <button type="button"
                onclick="generatePDF()"
                class="w-full md:w-auto px-6 py-3 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg transition-colors duration-200 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                </svg>
                Generate Report
            </button>
        </div>
    </div>

    <!-- Participants Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
        <div class="overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-4 text-sm font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-4 text-sm font-medium text-gray-500 uppercase tracking-wider">Volunteer Name</th>
                        <th class="px-6 py-4 text-sm font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-4 text-sm font-medium text-gray-500 uppercase tracking-wider">Time</th>
                        <th class="px-6 py-4 text-sm font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($participants as $index => $participant)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">
                                    @if($participant->member)
                                        {{ $participant->member->name }}
                                    @elseif($participant->nonmember)
                                        {{ $participant->nonmember->name }}
                                    @else
                                        N/A
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                @if($event->event_price > 0)
                                    {{ $participant->payment_date }}
                                @else
                                    {{ $participant->join_date }}
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                @if($event->event_price > 0)
                                    {{ $participant->payment_time }}
                                @else
                                    {{ $participant->join_time }}
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($participant->member)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        {{ $participant->member->member_status }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        Public
                                    </span>
                                @endif
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
                    Showing {{ $participants->firstItem() }} to {{ $participants->lastItem() }} of {{ $participants->total() }} entries
                </p>
                <div class="flex items-center space-x-1">
                    @if($participants->onFirstPage())
                        <button class="px-3 py-1 text-sm text-gray-500 bg-gray-100 rounded-md cursor-not-allowed">
                            Previous
                        </button>
                    @else
                        <a href="{{ $participants->previousPageUrl() }}" 
                           class="px-3 py-1 text-sm text-gray-600 bg-gray-100 rounded-md hover:bg-gray-200 transition-colors duration-200">
                            Previous
                        </a>
                    @endif

                    @foreach ($participants->getUrlRange(1, $participants->lastPage()) as $page => $url)
                        @if ($page == $participants->currentPage())
                            <button class="px-3 py-1 text-sm text-white bg-yellow-500 rounded-md">
                                {{ $page }}
                            </button>
                        @else
                            <a href="{{ $url }}" 
                               class="px-3 py-1 text-sm text-gray-600 bg-gray-100 rounded-md hover:bg-gray-200 transition-colors duration-200">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    @if($participants->hasMorePages())
                        <a href="{{ $participants->nextPageUrl() }}" 
                           class="px-3 py-1 text-sm text-gray-600 bg-gray-100 rounded-md hover:bg-gray-200 transition-colors duration-200">
                            Next
                        </a>
                    @else
                        <button class="px-3 py-1 text-sm text-gray-500 bg-gray-100 rounded-md cursor-not-allowed">
                            Next
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const rows = document.querySelectorAll('tbody tr');

            searchInput.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();

                rows.forEach(row => {
                    const name = row.querySelector('td:nth-child(2)')?.textContent.toLowerCase() || '';
                    const status = row.querySelector('td:nth-child(5)')?.textContent.toLowerCase() || '';

                    if (name.includes(searchTerm) || status.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });

        function generatePDF() {
            Swal.fire({
                title: 'Generating Report',
                text: 'Your report is being generated...',
                icon: 'info',
                timer: 2000,
                showConfirmButton: false
            });
        }
    </script>
</x-admin-layout>
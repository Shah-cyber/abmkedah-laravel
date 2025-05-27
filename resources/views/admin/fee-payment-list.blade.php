<x-admin-layout>
    <!-- Header Section with improved styling -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Fee Payment List</h1>
                <p class="text-sm text-gray-600 mt-1">Manage and track event fee payments</p>
            </div>
        </div>
    </div>

    <!-- Stats and Search Section -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <!-- Search Box -->
        <div class="md:col-span-3">
            <div class="relative">
                <input type="text"
                    id="searchInput"
                    class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200"
                    placeholder="Search by event name or price...">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="absolute left-3 top-3.5 h-5 w-5 text-gray-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>

        <!-- Stats Card -->
        <div class="bg-white rounded-lg shadow-sm p-4 flex items-center justify-between border border-gray-200">
            <div>
                <p class="text-sm text-gray-600">Total Events</p>
                <p class="text-2xl font-bold text-gray-900">{{ $events->total() }}</p>
            </div>
            <div class="p-3 bg-yellow-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
        <div class="overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-4 text-sm font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-4 text-sm font-medium text-gray-500 uppercase tracking-wider">Event Name</th>
                        <th class="px-6 py-4 text-sm font-medium text-gray-500 uppercase tracking-wider">Event Price</th>
                        <th class="px-6 py-4 text-sm font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($events as $event)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $event->event_id }}</td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $event->event_name }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">RM{{ number_format($event->event_price, 2) }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <a href="{{ route('admin.fee-payment.report', ['id' => $event->event_id]) }}" 
                                   class="inline-flex items-center px-3 py-1.5 bg-green-500 hover:bg-green-600 text-white rounded-md transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    Report
                                </a>
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
                    Showing {{ $events->firstItem() }} to {{ $events->lastItem() }} of {{ $events->total() }} entries
                </p>
                <div class="flex items-center space-x-1">
                    @if($events->onFirstPage())
                        <button class="px-3 py-1 text-sm text-gray-500 bg-gray-100 rounded-md cursor-not-allowed">
                            Previous
                        </button>
                    @else
                        <a href="{{ $events->previousPageUrl() }}" 
                           class="px-3 py-1 text-sm text-gray-600 bg-gray-100 rounded-md hover:bg-gray-200 transition-colors duration-200">
                            Previous
                        </a>
                    @endif

                    @foreach ($events->getUrlRange(1, $events->lastPage()) as $page => $url)
                        @if ($page == $events->currentPage())
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

                    @if($events->hasMorePages())
                        <a href="{{ $events->nextPageUrl() }}" 
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
                    const eventName = row.querySelector('td:nth-child(2)')?.textContent.toLowerCase() || '';
                    const eventPrice = row.querySelector('td:nth-child(3)')?.textContent.toLowerCase() || '';

                    if (eventName.includes(searchTerm) || eventPrice.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
</x-admin-layout>
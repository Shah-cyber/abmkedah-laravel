<x-member-layout>
    <style>
        .search-input:focus + .search-icon {
            @apply text-blue-500;
        }

        .pagination-btn {
            @apply px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200;
        }

        .pagination-btn.active {
            @apply bg-blue-600 text-white hover:bg-blue-700;
        }

        .pagination-btn.inactive {
            @apply bg-gray-100 text-gray-600 hover:bg-gray-200;
        }

        .pagination-btn.disabled {
            @apply opacity-50 cursor-not-allowed pointer-events-none;
        }

        .achievement-row {
            @apply transition-all duration-200;
        }

        .achievement-row:hover {
            @apply bg-gray-50;
        }

        .merit-badge {
            @apply inline-flex items-center px-2.5 py-1 rounded-full text-sm font-medium;
        }

        .merit-badge.positive {
            @apply bg-green-100 text-green-800;
        }

        .merit-badge.zero {
            @apply bg-gray-100 text-gray-800;
        }
    </style>

    <div class="p-6 space-y-6">
        <!-- Header Section with Stats -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Achievement Records</h1>
                    <p class="text-gray-500 mt-1">Track your event participation and merit points</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="bg-blue-50 text-blue-600 px-4 py-2 rounded-lg flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="font-medium">Total Events: {{ $data->total() }}</span>
                    </div>
                    <div class="bg-green-50 text-green-600 px-4 py-2 rounded-lg flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="font-medium">Total Merit: {{ $data->sum('merit_point') }}</span>
                    </div>
                </div>
            </div>
    </div>

        <!-- Search and Filter Section -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex flex-col md:flex-row md:items-center gap-4">
                <div class="relative flex-1">
            <input
                type="text"
                        id="searchInput"
                        class="search-input w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                        placeholder="Search by event name..." />
                    <svg class="search-icon absolute left-4 top-3.5 h-5 w-5 text-gray-400 transition-colors duration-200"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
    </div>
    </div>

        <!-- Achievement Records Table -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">no.</th>
                            <th scope="col" class="px-6 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Event Details</th>
                            <th scope="col" class="px-6 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Merit Points</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="achievementTable">
                        @forelse($data as $key => $item)
                            <tr class="achievement-row text-center">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $key + 1 }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $item->event_name }}</div>
                                    {{-- <div class="text-sm text-gray-500">Event ID: #{{ $item->event_id }}</div> --}}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="merit-badge flex items-center gap-2 justify-center {{ $item->merit_point > 0 ? 'positive' : 'zero' }}">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            @if($item->merit_point > 0)
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            @else
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            @endif
                                        </svg>
                                        <span>
                                            {{ $item->merit_point > 0 ? $item->merit_point : 'No Merit' }}
                                        </span>
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-10 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                        <p class="text-gray-500 text-lg font-medium">No achievements found</p>
                                        <p class="text-gray-400 text-sm mt-1">Participate in events to earn merit points</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    <!-- Pagination -->
        @if($data->hasPages())
            <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
    <p class="text-sm text-gray-600">
                        Showing <span class="font-medium">{{ $data->firstItem() }}</span> to 
                        <span class="font-medium">{{ $data->lastItem() }}</span> of 
                        <span class="font-medium">{{ $data->total() }}</span> achievements
    </p>
                    <div class="flex items-center gap-2">
        @if ($data->onFirstPage())
                            <button class="pagination-btn disabled">Previous</button>
        @else
                            <a href="{{ $data->previousPageUrl() }}" class="pagination-btn inactive">Previous</a>
        @endif

        @foreach ($data->getUrlRange(max(1, $data->currentPage() - 2), min($data->lastPage(), $data->currentPage() + 2)) as $page => $url)
                            <a href="{{ $url }}" class="pagination-btn {{ $page == $data->currentPage() ? 'active' : 'inactive' }}">
                {{ $page }}
            </a>
        @endforeach

        @if ($data->hasMorePages())
                            <a href="{{ $data->nextPageUrl() }}" class="pagination-btn inactive">Next</a>
        @else
                            <button class="pagination-btn disabled">Next</button>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Search functionality
            const searchInput = document.getElementById('searchInput');
            if (searchInput) {
                searchInput.addEventListener('input', (e) => {
                    const searchTerm = e.target.value.toLowerCase();
                    const rows = document.querySelectorAll('#achievementTable tr');
                    
                    rows.forEach(row => {
                        const eventName = row.querySelector('td:nth-child(2)')?.textContent.toLowerCase() || '';
                        const matches = eventName.includes(searchTerm);
                        row.style.display = matches ? '' : 'none';
                    });
                });
            }
        });
    </script>

    <!-- Certificate Modal -->
    <div id="certificateModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-64 right-0 z-50 flex items-center justify-center w-[calc(100%-16rem)] p-4 overflow-x-hidden overflow-y-auto h-modal md:h-full hidden bg-black bg-opacity-20">
        <div class="relative w-xs max-w-xs bg-white rounded-lg shadow dark:bg-black-400">
            <!-- Modal Header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <div class="flex justify-center">
                    <a href="https://images.pexels.com/photos/12568133/pexels-photo-12568133.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" download
                       class="px-4 py-2 text-white bg-yellow-500 hover:bg-yellow-700 rounded-lg">
                        Download Certificate
                    </a>
                </div>
                <button
                    type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="certificateModal"
                >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6 space-y-4">
                <img src="https://img.freepik.com/free-vector/stylish-certificate-design_1284-15338.jpg?semt=ais_hybrid" alt="Certificate" class="w-full rounded-lg shadow">
            </div>
        </div>
    </div>

</x-member-layout>
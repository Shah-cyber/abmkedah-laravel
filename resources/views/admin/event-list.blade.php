<x-admin-layout>
    <!-- Header Section with improved styling -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Event Record</h1>
                <p class="text-sm text-gray-600 mt-1">Manage and track all events</p>
            </div>
            <a href="/admin/event-record/add" 
               class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg transition-colors duration-200 font-medium shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Event
            </a>
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
                    placeholder="Search by event name or status...">
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Loading Indicator -->
    <div id="loading" class="hidden">
        <div class="flex justify-center items-center py-4">
            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-yellow-500"></div>
            <span class="ml-2 text-gray-600">Loading...</span>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
        <div class="overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-4 text-sm font-medium text-gray-500 uppercase tracking-wider">No.</th>
                        <th class="px-6 py-4 text-sm font-medium text-gray-500 uppercase tracking-wider">Event Name</th>
                        <th class="px-6 py-4 text-sm font-medium text-gray-500 uppercase tracking-wider">Banner</th>
                        <th class="px-6 py-4 text-sm font-medium text-gray-500 uppercase tracking-wider">Event Date</th>
                        <th class="px-6 py-4 text-sm font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-sm font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="event-table" class="divide-y divide-gray-200">
                    @forelse ($events as $index => $event)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 text-sm text-gray-900">
                            {{ $loop->iteration + ($events->currentPage() - 1) * $events->perPage() }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $event->event_name }}</div>
                        </td>
                        <td class="px-6 py-4">
                            @if ($event->banner)
                                <img src="{{ asset('storage/' . $event->banner) }}" 
                                     alt="Event Banner" 
                                     class="w-32 h-20 object-cover rounded-lg cursor-pointer hover:opacity-75 transition-opacity duration-200"
                                     onclick="openModal('{{ asset('storage/' . $event->banner) }}')">
                            @else
                                <span class="text-sm text-gray-500">No Banner</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            {{ \Carbon\Carbon::parse($event->event_date)->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($event->event_status === 'running')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <span class="w-2 h-2 mr-1.5 bg-green-500 rounded-full"></span>
                                    Running
                                </span>
                            @elseif ($event->event_status === 'draft')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <span class="w-2 h-2 mr-1.5 bg-yellow-500 rounded-full"></span>
                                    Draft
                                </span>
                            @elseif ($event->event_status === 'ended')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    <span class="w-2 h-2 mr-1.5 bg-red-500 rounded-full"></span>
                                    Ended
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    <span class="w-2 h-2 mr-1.5 bg-gray-500 rounded-full"></span>
                                    Unknown
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm font-medium space-x-2">
                            <a href="/admin/event-record/report/{{ $event->event_id }}" 
                               class="inline-flex items-center px-3 py-1.5 bg-green-500 hover:bg-green-600 text-white rounded-md transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Report
                            </a>
                            <a href="/admin/event-record/update/{{ $event->event_id }}" 
                               class="inline-flex items-center px-3 py-1.5 bg-gray-500 hover:bg-gray-600 text-white rounded-md transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Update
                            </a>
                            <form action="{{ route('event.record.delete', $event->event_id) }}" method="POST" class="delete-form inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white rounded-md transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">No events found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($events->hasPages())
        <div class="bg-white px-6 py-4 border-t border-gray-200">
            <div class="flex justify-between items-center">
                <p class="text-sm text-gray-600">
                    Showing {{ $events->firstItem() }} to {{ $events->lastItem() }} of {{ $events->total() }} entries
                </p>
                <div class="flex items-center space-x-1">
                    @if ($events->onFirstPage())
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

                    @if ($events->hasMorePages())
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
        @endif
    </div>

    <!-- Banner Modal -->
    <div id="bannerModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-75 flex items-center justify-center">
        <div class="bg-white rounded-lg p-4 max-w-4xl mx-auto relative">
            <button id="closeModal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <img id="modalBannerImage" src="" alt="Event Banner" class="w-full h-auto rounded-lg max-h-[80vh] object-contain">
        </div>
    </div>

    <!-- Success/Error Messages -->
    @if (session('success'))
        <span id="success-message" class="hidden">{{ session('success') }}</span>
    @endif
    @if (session('info'))
        <span id="info-message" class="hidden">{{ session('info') }}</span>
    @endif
    @if ($errors->any())
        <span id="error-message" class="hidden">{{ implode(', ', $errors->all()) }}</span>
    @endif

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('admin/adminEvent.js') }}"></script>

    <script>
        // Search functionality
        $(document).ready(function() {
            $('input[type="text"]').on('input', function() {
                const searchTerm = $(this).val();
                $('#loading').removeClass('hidden');

                $.ajax({
                    url: "{{ route('event.record.search') }}",
                    method: 'GET',
                    data: { search: searchTerm },
                    success: function(response) {
                        $('#event-table').html(response);
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                    },
                    complete: function() {
                        $('#loading').addClass('hidden');
                    }
                });
            });
        });

        // Modal functionality
        function openModal(imageSrc) {
            const modal = document.getElementById('bannerModal');
            const modalImage = document.getElementById('modalBannerImage');
            modalImage.src = imageSrc;
            modal.classList.remove('hidden');
        }

        document.getElementById('closeModal').onclick = function() {
            document.getElementById('bannerModal').classList.add('hidden');
        }

        document.getElementById('bannerModal').onclick = function(event) {
            if (event.target === this) {
                this.classList.add('hidden');
            }
        }
    </script>
</x-admin-layout>
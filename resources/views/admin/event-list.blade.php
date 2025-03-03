<x-admin-layout>
    <!-- Header Section -->
    <div class="mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Event Record</h1>
        <hr class="border-gray-300 my-2">
    </div>

    <div id="loading" style="display: none;">Loading...</div>
    <!-- Search Section -->
    <div class="mb-6">
        <div class="relative w-full">
            <input
                type="text"
                class="w-full p-2 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Search">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="absolute left-3 top-3 h-5 w-5 text-gray-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM21 21l-5.197-5.197">
                </path>
            </svg>
        </div>
    </div>

    <!-- Add and Total Events Section -->
    <div class="flex items-center justify-between mb-6">
        <a href="/admin/event-record/add" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg font-medium shadow">
            Add Event
        </a>
        <p class="text-gray-600">Total Events: <span class="font-medium text-gray-900">{{ $events->total() }}</span></p>
    </div>

    {{-- <!-- Table -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="bg-gray-50 text-gray-700 uppercase text-xs"> 
                <tr>
                    <th class="px-4 py-3">NO.</th>
                    <th class="px-4 py-3">Event Name</th>
                    <th class="px-4 py-3">Banner</th>
                    <th class="px-4 py-3">Event Date</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($events as $index => $event)
                <tr class="border-b">
                    <td class="px-4 py-4">{{ $loop->iteration + ($events->currentPage() - 1) * $events->perPage() }}</td>
                    <td class="px-4 py-4">{{ $event->event_name }}</td>
                    <td class="px-4 py-4">
                        @if ($event->banner)
                        <img 
                            src="{{ asset('storage/' . $event->banner) }}" 
                            alt="Event Banner" 
                            class="w-32 h-auto rounded-md cursor-pointer" 
                            onclick="openModal('{{ asset('storage/' . $event->banner) }}')">
                        @else
                        <span class="text-gray-500">No Banner</span>
                        @endif
                    </td>
                    <td class="px-4 py-4">{{ \Carbon\Carbon::parse($event->event_date)->format('d/m/Y') }}</td>
                    <td class="px-4 py-4">
                        @if ($event->event_status === 'running')
                            <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                                Running
                            </span>
                        @elseif ($event->event_status === 'draft')
                            <span class="inline-flex items-center bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                <span class="w-2 h-2 me-1 bg-yellow-500 rounded-full"></span>
                                Draft
                            </span>
                        @elseif ($event->event_status === 'ended')
                            <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
                                Ended
                            </span>
                        @else
                            <span class="inline-flex items-center bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                <span class="w-2 h-2 me-1 bg-gray-500 rounded-full"></span>
                                Unknown
                            </span>
                        @endif
                    </td>
                    
                    <td class="px-4 py-4 flex space-x-2">
                        <a href="/admin/event-record/report/{{ $event->event_id }}" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md">Report</a>
                        <a href="/admin/event-record/update/{{ $event->event_id }}" class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded-md">Update</a>
                        <form action="{{ route('event.record.delete', $event->event_id) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-gray-500">No events found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div> --}}
    <!-- Table -->
<div class="overflow-x-auto bg-white rounded-lg shadow-md">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="bg-gray-50 text-gray-700 uppercase text-xs"> 
            <tr>
                <th class="px-4 py-3">NO.</th>
                <th class="px-4 py-3">Event Name</th>
                <th class="px-4 py-3">Banner</th>
                <th class="px-4 py-3">Event Date</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Action</th>
            </tr>
        </thead>
        <tbody id="event-table">
            @include('admin.event-list-table', ['events' => $events])
        </tbody>
    </table>
</div>

    
    <!-- Modal -->
<div id="bannerModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg p-4 max-w-xl mx-auto"> <!-- Increased max-width -->
        <span id="closeModal" class="absolute top-2 right-2 cursor-pointer text-gray-500">&times;</span>
        <img id="modalBannerImage" src="" alt="Event Banner" class="w-full h-auto rounded-md max-h-[80vh] object-contain">
    </div>
</div>

    <!-- Pagination -->
    <div class="flex justify-between items-center mt-6">
        @if ($events->hasPages())
            <div class="flex items-center space-x-2">
                @if ($events->onFirstPage())
                    <button class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md cursor-not-allowed" disabled>
                        Previous
                    </button>
                @else
                    <a href="{{ $events->previousPageUrl() }}" class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300">
                        Previous
                    </a>
                @endif

                <div class="flex items-center space-x-1">
                    @foreach ($events->links()->elements as $element)
                        @if (is_string($element))
                            <span class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md">{{ $element }}</span>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $events->currentPage())
                                    <span class="px-3 py-1 text-sm text-white bg-blue-500 rounded-md">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>

                @if ($events->hasMorePages())
                    <a href="{{ $events->nextPageUrl() }}" class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300">
                        Next
                    </a>
                @else
                    <button class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md cursor-not-allowed" disabled>
                        Next
                    </button>
                @endif
            </div>
        @endif
    </div>

    @if (session('success'))
    <span id="success-message" class="hidden">{{ session('success') }}</span>
    @endif
    @if (session('info'))
        <span id="info-message" class="hidden">{{ session('info') }}</span>
    @endif
    @if ($errors->any())
        <span id="error-message" class="hidden">{{ implode(', ', $errors->all()) }}</span>
    @endif


    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    

    <!-- Custom JavaScript to handle messages -->
    <script src="{{ asset('admin/adminEvent.js') }}"></script>
    <script>
     $(document).ready(function() {
    $('input[type="text"]').on('input', function() {
        const searchTerm = $(this).val();

        // Show loading indicator
        $('#loading').show();

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
                // Hide loading indicator
                $('#loading').hide();
            }
        });
    });
});
    </script>
    
    
    <script>
        function openModal(imageSrc) {
            const modal = document.getElementById('bannerModal');
            const modalImage = document.getElementById('modalBannerImage');
            modalImage.src = imageSrc; // Set the source of the modal image
            modal.classList.remove('hidden'); // Show the modal
        }
    
        // Close the modal when the close button is clicked
        document.getElementById('closeModal').onclick = function() {
            document.getElementById('bannerModal').classList.add('hidden');
        }
    
        // Close the modal when clicking outside of the modal content
        document.getElementById('bannerModal').onclick = function(event) {
            if (event.target === this) {
                this.classList.add('hidden');
            }
        }
    </script>
</x-admin-layout>
<x-admin-layout>
    <!-- Header Section -->
    <div class="mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Fee Payment List</h1>
        <!-- Horizontal Line -->
        <hr class="border-gray-300 my-2">
    </div>

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

       <!-- Export and Total Members Section -->
       <div class="flex items-center justify-end mb-6">
        <!-- Total Members -->
        <p class="text-gray-600">Total Fee Payment:
            <span class="font-medium text-gray-900">{{ $events->count() }}</span>
        </p>
    </div>





    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="bg-gray-50 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Event Name</th>
                    <th class="px-4 py-3">Event Price</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr class="border-b">
                        <td class="px-4 py-4">{{ $event->event_id }}</td>
                        <td class="px-4 py-4">{{ $event->event_name }}</td>
                        <td class="px-4 py-4">RM{{ number_format($event->event_price, 2) }}</td>
                        <td class="px-4 py-4 flex space-x-2">
                            <a href="{{ route('admin.fee-payment.report', ['id' => $event->event_id]) }}" 
                            class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md">
                                Report
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-between items-center mt-6">
        <p class="text-sm text-gray-600">
            Showing {{ $events->firstItem() }} to {{ $events->lastItem() }} of {{ $events->total() }} entries
        </p>
        <div class="flex items-center space-x-1">
            @if($events->onFirstPage())
                <button class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md cursor-not-allowed">
                    Previous
                </button>
            @else
                <a href="{{ $events->previousPageUrl() }}" class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300">
                    Previous
                </a>
            @endif

            @foreach ($events->getUrlRange(1, $events->lastPage()) as $page => $url)
                @if ($page == $events->currentPage())
                    <button class="px-3 py-1 text-sm text-white bg-blue-500 rounded-md">
                        {{ $page }}
                    </button>
                @else
                    <a href="{{ $url }}" class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300">
                        {{ $page }}
                    </a>
                @endif
            @endforeach

            @if($events->hasMorePages())
                <a href="{{ $events->nextPageUrl() }}" class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300">
                    Next
                </a>
            @else
                <button class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md cursor-not-allowed">
                    Next
                </button>
            @endif
        </div>
    </div>
</x-admin-layout>
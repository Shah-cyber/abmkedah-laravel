<x-member-layout>
    <div class="p-6 ">
        <!-- Header Section -->
        <div class="mb-4">
            <h1 class="text-2xl font-bold text-gray-800">Active Activity List</h1>
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
        <div class="flex justify-end mb-6">
            <!-- Total Events -->
            <p class="text-gray-600">
                Total Event: 
                <span class="font-medium text-gray-900">{{ $events->total() }}</span>
            </p>
        </div>

        <!-- Activity Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($events as $event)
            <div class="bg-white border rounded-lg shadow hover:shadow-lg transition">
                <!-- Image Section -->
                <div class="relative">
                    <img
                        src="{{ $event->banner ? asset('storage/' . $event->banner) : asset('images/default-event-banner.jpg') }}"
                        alt="{{ $event->event_name }}"
                        class="w-full h-36 object-cover rounded-t-lg"
                    />
                    <!-- Date Box -->
                    <div class="absolute bottom-2 right-2 bg-white text-gray-800 text-center px-4 py-2 rounded-sm shadow border">
                        <p class="text-xs font-semibold">{{ \Carbon\Carbon::parse($event->event_date)->format('M') }}</p>
                        <p class="text-xs font-semibold">{{ \Carbon\Carbon::parse($event->event_date)->format('D') }}</p>
                        <p class="text-xs font-semibold">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</p>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $event->event_name }}</h3>
                    <p class="text-sm text-gray-500 mb-3">{{ $event->event_location }}</p>
                    <p class="text-sm text-gray-500 flex items-center font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        {{ \Carbon\Carbon::parse($event->event_start_time)->format('g:iA') }}
                    </p>
                    <p class="text-sm text-gray-500 flex items-center font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                        </svg>
                        From: RM {{ number_format($event->event_price, 2) }}
                    </p>
                </div>
                <div class="flex items-center p-4 border-t justify-between">
                    <p class="text-xs text-gray-500">#{{ $event->event_category }}</p>
                    <a href="{{ route('member.event-registration', ['id' => $event->event_id]) }}" class="w-24 block">
                        <button class="w-full bg-green-500 text-white py-2 px-4 rounded-lg font-medium hover:bg-green-600 transition">
                            Register
                        </button>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Pagination -->
        <div class="flex justify-between items-center mt-6">
            <p class="text-sm text-gray-600">Showing {{ $events->firstItem() }} to {{ $events->lastItem() }} of {{ $events->total() }} entries</p>
            <div class="flex items-center space-x-1">
                @if ($events->onFirstPage())
                    <button class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md cursor-not-allowed" disabled>
                        Previous
                    </button>
                @else
                    <a href="{{ $events->previousPageUrl() }}" class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300">
                        Previous
                    </a>
                @endif

                @foreach ($events->getUrlRange(1, $events->lastPage()) as $page => $url)
                    @if ($page == $events->currentPage())
                        <button class="px-3 py-1 text-sm text-white bg-blue-500 rounded-md hover:bg-blue-600">
                            {{ $page }}
                        </button>
                    @else
                        <a href="{{ $url }}" class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach

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
        </div>
    </div>

</x-member-layout>
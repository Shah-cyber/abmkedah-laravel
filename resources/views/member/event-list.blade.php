<x-member-layout>
    <div class="max-w-7xl mx-auto p-6">
        <!-- Header Section -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Active Events</h1>
            <p class="text-gray-600 mt-2">Discover and join upcoming events</p>
        </div>

        <!-- Search and Stats Section -->
        <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <!-- Search Bar -->
                <div class="relative flex-1 max-w-lg">
                    <form action="{{ route('member.event.list') }}" method="GET">
                        <input
                            type="text"
                            name="search"
                            value="{{ $search ?? '' }}"
                            class="w-full pl-12 pr-16 py-3 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200"
                            placeholder="Search events by name, category, or location...">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="absolute left-4 top-3.5 h-5 w-5 text-gray-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
                            </path>
                        </svg>
                        <button type="submit" class="absolute right-3 top-2.5 px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition-colors">
                            Search
                        </button>
                    </form>
                    
                    @if(!empty($search))
                    <div class="mt-2 flex items-center">
                        <span class="text-sm text-gray-600 mr-2">Searching for: "{{ $search }}"</span>
                        <a href="{{ route('member.event.list') }}" class="text-sm text-yellow-600 hover:text-yellow-800 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Clear search
                        </a>
                    </div>
                    @endif
                </div>

                <!-- Stats -->
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-2">
                        <div class="p-2 bg-yellow-100 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="flex items-center gap-2">
                            <p class="text-sm text-gray-600">Total Events:</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $events->total() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Event Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @if($events->count() > 0)
                @foreach($events as $event)
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-200 overflow-hidden">
                    <!-- Image Section -->
                    <div class="relative aspect-[4/3]">
                        <img
                            src="{{ $event->banner ? asset('storage/' . $event->banner) : asset('images/default-event-banner.jpg') }}"
                            alt="{{ $event->event_name }}"
                            class="w-full h-full object-cover"
                        />
                        <!-- Date Box -->
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-gray-800 px-3 py-2 rounded-lg shadow-sm">
                            <div class="text-center">
                                <p class="text-sm font-bold text-yellow-600">{{ \Carbon\Carbon::parse($event->event_date)->format('M') }}</p>
                                <p class="text-xl font-bold text-gray-900">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</p>
                                <p class="text-xs font-medium text-gray-600">{{ \Carbon\Carbon::parse($event->event_date)->format('D') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-5">
                        <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $event->event_name }}</h3>
                        
                        <div class="space-y-2 mb-4">
                            <!-- Location -->
                            <div class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <p class="text-sm">{{ $event->event_location }}</p>
                            </div>

                            <!-- Time -->
                            <div class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="text-sm">{{ \Carbon\Carbon::parse($event->event_start_time)->format('g:i A') }}</p>
                            </div>

                            <!-- Price -->
                            <div class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="text-sm">RM {{ number_format($event->event_price, 2) }}</p>
                            </div>
                        </div>

                        <!-- Category and Register Button -->
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <span class="px-3 py-1 text-xs font-medium text-yellow-600 bg-yellow-50 rounded-full">
                                {{ $event->event_category }}
                            </span>
                            <a href="{{ route('member.event-registration', ['id' => $event->event_id]) }}" 
                               class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 transition-all duration-200 transform hover:-translate-y-0.5">
                                Register
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-span-full text-center py-12">
                    <div class="mx-auto w-24 h-24 mb-4">
                        <svg class="w-full h-full text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-medium text-gray-900 mb-2">No events found</h3>
                    @if(!empty($search))
                        <p class="text-gray-500 mb-4">No events match your search "{{ $search }}"</p>
                        <a href="{{ route('member.event.list') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 transition-all duration-200">
                            View all events
                        </a>
                    @else
                        <p class="text-gray-500">There are no upcoming events at this time.</p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Pagination -->
        <div class="mt-8 bg-white rounded-xl shadow-sm p-4">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-gray-600">
                    Showing <span class="font-medium">{{ $events->firstItem() ?: 0 }}</span> to 
                    <span class="font-medium">{{ $events->lastItem() ?: 0 }}</span> of 
                    <span class="font-medium">{{ $events->total() }}</span> events
                </p>
                
                <div class="flex items-center gap-2">
                    @if ($events->onFirstPage())
                        <span class="px-4 py-2 text-sm text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                            Previous
                        </span>
                    @else
                        <a href="{{ $events->appends(['search' => $search])->previousPageUrl() }}" 
                           class="px-4 py-2 text-sm text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                            Previous
                        </a>
                    @endif

                    <div class="flex items-center gap-1">
                        @foreach ($events->appends(['search' => $search])->getUrlRange(1, $events->lastPage()) as $page => $url)
                            @if ($page == $events->currentPage())
                                <span class="px-4 py-2 text-sm text-white bg-yellow-500 rounded-lg">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}" 
                                   class="px-4 py-2 text-sm text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    </div>

                    @if ($events->hasMorePages())
                        <a href="{{ $events->appends(['search' => $search])->nextPageUrl() }}" 
                           class="px-4 py-2 text-sm text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                            Next
                        </a>
                    @else
                        <span class="px-4 py-2 text-sm text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                            Next
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-member-layout>
<x-non-member-layout>
    

    @if(session('success'))
        <div id="success-message" style="display: none;">{{ session('success') }}</div>
    @endif

      <!-- Hero Section -->
<div class="w-full bg-white shadow-sm">
    <div class="container mx-auto p-6">
        <div class="flex flex-col md:flex-row items-center gap-6">
            <div class="md:w-1/2">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">New Leaders Are Born</h1>
                <p class="text-gray-600">ABM seeks to develop leadership qualities in youth nationwide by working on impactful initiatives and mentoring future generations.</p>
            </div>
            <div class="md:w-1/2">
                <img src="https://images.pexels.com/photos/1187086/pexels-photo-1187086.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Leaders" class="rounded-lg shadow-md">
            </div>
            <!-- Logo Section -->
            <div class="md:w-1/4 flex justify-center items-center">
                <img src="{{ asset('images/abm-logo.svg') }}" alt="ABM Logo" class="h-40 w-auto">
            </div>
        </div>
    </div>
</div>

    <!-- Content Section -->
    <div class="container mx-auto py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">

            <!-- News Bulletin -->
            <div class="md:col-span-2">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">News Bulletin</h2>
                <div class="mb-4">
                    <input type="text" placeholder="Search with keyword" class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none" />
                </div>
                <div class="space-y-6">
                    <!-- News Card -->
                    <div class="flex bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="https://images.pexels.com/photos/917510/pexels-photo-917510.jpeg?auto=compress&cs=tinysrgb&w=600" alt="News" class="w-24 h-auto m-2 mr-1 object-cover">
                        <div class="p-4 flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Government Announces New Stimulus Package</h3>
                                <p class="text-md text-gray-400">
                                    August 13, 2024
                                </p>
                                <p class="text-sm text-gray-800 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <button class="mt-4 text-sm text-white px-4 py-2 bg-black rounded-lg self-end">
                                Read More
                            </button>
                        </div>
                    </div>
                    <!-- Duplicate the above news card as needed -->
                    <div class="flex bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="https://images.pexels.com/photos/3321796/pexels-photo-3321796.jpeg?auto=compress&cs=tinysrgb&w=600" alt="News" class="w-24 h-auto m-2 mr-1 object-cover">
                        <div class="p-4 flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Government Announces New Stimulus Package</h3>
                                <p class="text-md text-gray-400">
                                    August 13, 2024
                                </p>
                                <p class="text-sm text-gray-800 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <button class="mt-4 text-sm text-white px-4 py-2 bg-black rounded-lg self-end">
                                Read More
                            </button>
                        </div>
                    </div>
                    <!-- News Card -->
                    <div class="flex bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="https://images.pexels.com/photos/1309584/pexels-photo-1309584.jpeg?auto=compress&cs=tinysrgb&w=600" alt="News" class="w-24 h-auto m-2 mr-1 object-cover">
                        <div class="p-4 flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Government Announces New Stimulus Package</h3>
                                <p class="text-md text-gray-400">
                                    August 13, 2024
                                </p>
                                <p class="text-sm text-gray-800 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <button class="mt-4 text-sm text-white px-4 py-2 bg-black rounded-lg self-end">
                                Read More
                            </button>
                        </div>
                    </div>
                    <!-- Duplicate the above news card as needed -->
                    <div class="flex bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="https://images.pexels.com/photos/163185/old-retro-antique-vintage-163185.jpeg?auto=compress&cs=tinysrgb&w=600" alt="News" class="w-24 h-auto m-2 mr-1 object-cover">
                        <div class="p-4 flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Government Announces New Stimulus Package</h3>
                                <p class="text-md text-gray-400 ">
                                    August 13, 2024
                                </p>
                                <p class="text-sm text-gray-800 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <button class="mt-4 text-sm text-white px-4 py-2 bg-black rounded-lg self-end">
                                Read More
                            </button>
                        </div>
                    </div>
                </div>
            </div>

      <!-- Events -->
        <div class="h-auto bg-white shadow-md rounded-lg p-4 self-start">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Events</h2>

            <!-- Calendar Header -->
            <div class="flex justify-between items-center bg-gray-900 text-white px-4 py-2 rounded-t-lg">
                <button id="prevMonth" class="text-white hover:text-gray-300">&lt;</button>
                <span id="calendarHeader" class="text-lg font-semibold">{{ now()->format('F Y') }}</span>
                <button id="nextMonth" class="text-white hover:text-gray-300">&gt;</button>
            </div>

            <!-- Event List -->
            <div class="divide-y-2 divide-gray-600 max-h-80 overflow-y-auto" id="eventList">
                <p class="text-center p-4 text-gray-500">Loading events...</p>
            </div>
        </div>


                {{-- <!-- More Button -->
                <div class="border-t-2 border-gray-600 ">
                    <div class="flex justify-center mt-4">
                        <button class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800">More</button>
                    </div>
                </div> --}}
            </div>

        </div>
    </div>

    @include('non-member.footer')
    
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="{{ asset('non-member/NonMemberEventRegister.js') }}"></script>
<script>
    let currentDate = new Date();

    function updateEvents() {
        const month = currentDate.getMonth() + 1; // JS months start from 0
        const year = currentDate.getFullYear();

        document.getElementById("calendarHeader").innerText = 
            new Intl.DateTimeFormat('en-US', { month: 'long', year: 'numeric' }).format(currentDate);

        fetch(`/events?month=${month}&year=${year}`)
            .then(response => response.json())
            .then(data => {
                const eventList = document.getElementById("eventList");
                eventList.innerHTML = "";

                if (data.events.length === 0) {
                    eventList.innerHTML = `<p class="text-center p-4 text-gray-500">No events available in this month.</p>`;
                } else {
                    data.events.forEach(event => {
                        const eventTime = event.event_start_time 
                            ? new Date('1970-01-01T' + event.event_start_time) 
                            : null;

                            eventList.innerHTML += `
                                <div class="flex items-center p-4">
                                    <div class="bg-yellow-500 text-center text-black w-20 h-20 flex flex-col justify-center items-center rounded-lg">
                                        <span class="block text-sm">${new Date(event.event_date).toLocaleString('en-US', { weekday: 'short' })}</span>
                                        <span class="block text-2xl font-bold">${new Date(event.event_date).getDate()}</span>
                                    </div>
                                    <div class="bg-gray-100 flex-1 p-4 ml-4 rounded-lg shadow-md">
                                        <p class="text-sm font-bold text-gray-900">${event.event_name}</p>
                                        <p class="text-sm text-gray-500 flex items-center">
                                            <img src="{{ asset('images/location.svg') }}" alt="Location Icon" class="h-4 w-4 mr-1">
                                            ${event.event_location}
                                        </p>
                                        <p class="text-sm text-gray-500 flex items-center">
                                            <img src="{{ asset('images/time.svg') }}" alt="Time Icon" class="h-4 w-4 mr-1">
                                            ${eventTime ? eventTime.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }) : "No Time Available"}
                                        </p>
                                        <a href="/event/${event.event_id}" class="mt-2 inline-block px-3 py-1 text-xs font-medium text-white bg-black rounded-md hover:bg-green-600">
                                            View Details
                                        </a>
                                    </div>
                                </div>`;
                    });
                }
            });
    }

    document.getElementById("prevMonth").addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        updateEvents();
    });

    document.getElementById("nextMonth").addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        updateEvents();
    });

    // Load initial events
    updateEvents();
</script>
    
    
</x-non-member-layout>

<!-- Include SweetAlert2 -->

<!-- Include your custom JS file -->



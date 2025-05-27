<x-non-member-layout>
    

    @if(session('success'))
        <div id="success-message" style="display: none;">{{ session('success') }}</div>
    @endif

    <!-- Hero Section -->
    <div class="w-full bg-gradient-to-r from-yellow-50 to-white shadow-sm">
        <div class="container mx-auto py-12 px-6">
            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="md:w-1/2 space-y-6">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-800 leading-tight">New Leaders Are <span class="text-yellow-500">Born</span></h1>
                    <p class="text-lg text-gray-600">ABM seeks to develop leadership qualities in youth nationwide by working on impactful initiatives and mentoring future generations.</p>
                    <div class="pt-4">
                        <button onclick="scrollToNewsBulletin()" class="inline-flex items-center px-6 py-3 bg-yellow-500 text-white font-medium rounded-lg shadow-md hover:bg-yellow-600 transition-all duration-200 transform hover:-translate-y-0.5">
                            Let's Explore!
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </button>
                    </div>

                    <script>
                        function scrollToNewsBulletin() {
                            document.querySelector('.md\\:col-span-2').scrollIntoView({ 
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    </script>
                </div>
                <div class="md:w-1/2 flex justify-center items-center">
                    <div class="relative">
                        <div class="absolute -inset-1 bg-yellow-500 rounded-lg blur-md opacity-25 z-0"></div>
                        <img src="https://images.pexels.com/photos/1187086/pexels-photo-1187086.jpeg?auto=compress&cs=tinysrgb&w=600" 
                            alt="Leaders" 
                            class="relative z-10 rounded-lg shadow-lg w-full h-auto object-cover max-w-lg">
                        <div class="absolute -bottom-6 -right-6 z-20">
                            <img src="{{ asset('images/abm-logo.svg') }}" alt="ABM Logo" class="h-28 w-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="container mx-auto py-16 px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">
            <!-- News Bulletin -->
            <div class="md:col-span-2">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">News Bulletin</h2>
                    <div class="flex items-center gap-2">
                        <span class="px-3 py-1 text-xs font-medium text-yellow-600 bg-yellow-50 rounded-full">Latest Updates</span>
                    </div>
                </div>
                
                <div class="mb-6">
                    <div class="relative">
                        <input type="text" placeholder="Search with keyword" 
                            class="w-full p-4 pl-12 rounded-lg border border-gray-200 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200" />
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
                
                <div class="space-y-6">
                    <!-- News Cards -->
                    <div class="bg-white shadow-md hover:shadow-lg transition-all duration-200 rounded-xl overflow-hidden">
                        <div class="flex flex-col md:flex-row">
                            <div class="md:w-1/4">
                                <img src="https://images.pexels.com/photos/917510/pexels-photo-917510.jpeg?auto=compress&cs=tinysrgb&w=600" 
                                    alt="News" 
                                    class="w-full h-48 md:h-full object-cover">
                            </div>
                            <div class="p-6 md:w-3/4 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center gap-2 mb-2">
                                        <span class="px-2 py-1 text-xs font-medium text-yellow-600 bg-yellow-50 rounded-full">Latest</span>
                                        <span class="text-sm text-gray-500">August 13, 2024</span>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Government Announces New Stimulus Package</h3>
                                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nisl vel tincidunt luctus, nisl nisl aliquam nisl, vel aliquam nisl nisl sit amet nisl.</p>
                                </div>
                                <div class="mt-4">
                                    <button class="inline-flex items-center px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition-all duration-200">
                                        Read More
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white shadow-md hover:shadow-lg transition-all duration-200 rounded-xl overflow-hidden">
                        <div class="flex flex-col md:flex-row">
                            <div class="md:w-1/4">
                                <img src="https://images.pexels.com/photos/3321796/pexels-photo-3321796.jpeg?auto=compress&cs=tinysrgb&w=600" 
                                    alt="News" 
                                    class="w-full h-48 md:h-full object-cover">
                            </div>
                            <div class="p-6 md:w-3/4 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center gap-2 mb-2">
                                        <span class="text-sm text-gray-500">August 10, 2024</span>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">New Leadership Workshop Announced</h3>
                                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nisl vel tincidunt luctus, nisl nisl aliquam nisl, vel aliquam nisl nisl sit amet nisl.</p>
                                </div>
                                <div class="mt-4">
                                    <button class="inline-flex items-center px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition-all duration-200">
                                        Read More
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white shadow-md hover:shadow-lg transition-all duration-200 rounded-xl overflow-hidden">
                        <div class="flex flex-col md:flex-row">
                            <div class="md:w-1/4">
                                <img src="https://images.pexels.com/photos/1309584/pexels-photo-1309584.jpeg?auto=compress&cs=tinysrgb&w=600" 
                                    alt="News" 
                                    class="w-full h-48 md:h-full object-cover">
                            </div>
                            <div class="p-6 md:w-3/4 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center gap-2 mb-2">
                                        <span class="text-sm text-gray-500">August 5, 2024</span>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">ABM Partners with Local Universities</h3>
                                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nisl vel tincidunt luctus, nisl nisl aliquam nisl, vel aliquam nisl nisl sit amet nisl.</p>
                                </div>
                                <div class="mt-4">
                                    <button class="inline-flex items-center px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition-all duration-200">
                                        Read More
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white shadow-md hover:shadow-lg transition-all duration-200 rounded-xl overflow-hidden">
                        <div class="flex flex-col md:flex-row">
                            <div class="md:w-1/4">
                                <img src="https://images.pexels.com/photos/163185/old-retro-antique-vintage-163185.jpeg?auto=compress&cs=tinysrgb&w=600" 
                                    alt="News" 
                                    class="w-full h-48 md:h-full object-cover">
                            </div>
                            <div class="p-6 md:w-3/4 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center gap-2 mb-2">
                                        <span class="text-sm text-gray-500">July 28, 2024</span>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Annual Leadership Conference Highlights</h3>
                                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nisl vel tincidunt luctus, nisl nisl aliquam nisl, vel aliquam nisl nisl sit amet nisl.</p>
                                </div>
                                <div class="mt-4">
                                    <button class="inline-flex items-center px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition-all duration-200">
                                        Read More
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- View All News Button -->
                <div class="mt-8 flex justify-center">
                    <a href="/blog" class="inline-flex items-center px-6 py-3 border border-yellow-500 text-yellow-500 font-medium rounded-lg hover:bg-yellow-50 transition-all duration-200">
                        View All News
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Events -->
            <div class="bg-white shadow-lg rounded-xl p-6 self-start">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Events</h2>
                    <span class="px-3 py-1 text-xs font-medium text-yellow-600 bg-yellow-50 rounded-full">Upcoming</span>
                </div>

                <!-- Calendar Header -->
                <div class="flex justify-between items-center bg-yellow-500 text-white px-4 py-3 rounded-t-lg mb-4">
                    <button id="prevMonth" class="text-white hover:text-gray-200 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <span id="calendarHeader" class="text-lg font-semibold">{{ now()->format('F Y') }}</span>
                    <button id="nextMonth" class="text-white hover:text-gray-200 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

                <!-- Event List -->
                <div class="divide-y divide-gray-200 max-h-96 overflow-y-auto pr-2 scrollbar-thin scrollbar-thumb-yellow-500 scrollbar-track-gray-100" id="eventList">
                    <div class="flex justify-center items-center py-8">
                        <div class="animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-yellow-500"></div>
                        <span class="ml-2 text-gray-500">Loading events...</span>
                    </div>
                </div>

                <!-- View All Events Button -->
                <div class="mt-6 flex justify-center">
                    <a href="/events" class="inline-flex items-center px-6 py-2 bg-yellow-500 text-white font-medium rounded-lg hover:bg-yellow-600 transition-all duration-200">
                        View All Events
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
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
                        eventList.innerHTML = `
                            <div class="py-8 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="text-gray-500">No events available in this month.</p>
                            </div>`;
                    } else {
                        data.events.forEach(event => {
                            const eventTime = event.event_start_time 
                                ? new Date('1970-01-01T' + event.event_start_time) 
                                : null;

                            eventList.innerHTML += `
                                <div class="py-4 hover:bg-gray-50 transition-colors duration-200">
                                    <div class="flex items-center gap-4">
                                        <div class="bg-yellow-500 text-center text-white w-16 h-16 flex flex-col justify-center items-center rounded-lg shadow-sm">
                                            <span class="block text-xs font-medium">${new Date(event.event_date).toLocaleString('en-US', { weekday: 'short' })}</span>
                                            <span class="block text-2xl font-bold">${new Date(event.event_date).getDate()}</span>
                                        </div>
                                        <div class="flex-1">
                                            <p class="font-bold text-gray-900 mb-1 line-clamp-1">${event.event_name}</p>
                                            <div class="flex items-center text-xs text-gray-500 mb-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                ${event.event_location}
                                            </div>
                                            <div class="flex items-center text-xs text-gray-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                ${eventTime ? eventTime.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }) : "No Time Available"}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 flex justify-end">
                                        <a href="/event/${event.event_id}" class="inline-flex items-center px-3 py-1 text-xs font-medium text-white bg-yellow-500 rounded-md hover:bg-yellow-600 transition-all duration-200">
                                            View Details
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>`;
                        });
                    }
                })
                .catch(error => {
                    const eventList = document.getElementById("eventList");
                    eventList.innerHTML = `
                        <div class="py-8 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-red-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <p class="text-gray-500">Failed to load events. Please try again.</p>
                        </div>`;
                    console.error('Error fetching events:', error);
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
        
        // Show success message if present
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.getElementById('success-message');
            if (successMessage && successMessage.textContent.trim() !== '') {
                Swal.fire({
                    title: 'Success!',
                    text: successMessage.textContent,
                    icon: 'success',
                    confirmButtonColor: '#EAB308',
                    confirmButtonText: 'OK'
                });
            }
        });
    </script>
    
    
</x-non-member-layout>





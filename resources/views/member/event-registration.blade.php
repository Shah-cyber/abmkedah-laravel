<x-member-layout>
    <style>
        .swal-btn {
            background-color: #EAB308 !important;
            color: white !important;
            border-radius: 8px !important;
            padding: 12px 24px !important;
            border: none !important;
            font-weight: 500 !important;
            transition: all 0.3s ease !important;
        }

        .swal-btn:hover {
            background-color: #CA8A04 !important;
            transform: translateY(-1px) !important;
        }

        .swal-btn-cancel {
            background-color: #EF4444 !important;
            color: white !important;
            border-radius: 8px !important;
            padding: 12px 24px !important;
            border: none !important;
            font-weight: 500 !important;
            transition: all 0.3s ease !important;
        }

        .swal-btn-cancel:hover {
            background-color: #DC2626 !important;
            transform: translateY(-1px) !important;
        }

        .swal2-actions {
            gap: 16px !important;
        }

        button.disabled {
            pointer-events: none;
            background-color: #6B7280 !important;
            opacity: 0.7;
        }

        .form-input-container {
            @apply border-2 border-gray-300 rounded-lg transition-all duration-200;
        }

        .form-input-container:hover {
            @apply border-yellow-500 shadow-md;
        }

        .form-icon-container {
            @apply bg-yellow-50 flex items-center justify-center rounded-l-lg transition-all duration-200;
        }

        .form-input-container:hover .form-icon-container {
            @apply bg-yellow-100;
        }

        .form-input {
            @apply w-full p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500;
        }
    </style>

    <div class="max-w-7xl mx-auto p-6">
        <!-- Header Section -->
        <div class="flex items-center mb-6">
            <a href="/member/event" class="flex items-center text-gray-600 hover:text-yellow-600 transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="ml-2 font-medium">Back to Events</span>
            </a>
        </div>

        <!-- Event Details Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
            <!-- Event Banner -->
            <div class="relative h-72">
                <img src="{{ asset('storage/' . $event->banner) }}"
                     alt="{{ $event->event_name }}"
                     class="w-full h-full object-cover"
                />
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6">
                    <h1 class="text-3xl font-bold text-white">{{ $event->event_name }}</h1>
                </div>
            </div>

            <!-- Event Content -->
            <div class="p-6">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Event Description -->
                    <div class="lg:col-span-2 space-y-6">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800 mb-4">About this event</h2>
                            <div class="space-y-4">
                                <div>
                                    <h3 class="font-medium text-gray-700 mb-2">CATEGORY</h3>
                                    <ul class="list-disc text-gray-600 ml-6 space-y-1">
                                        @foreach(explode(',', $event->event_category) as $category)
                                            <li>{{ trim($category) }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-700 mb-2">EVENT DESCRIPTION</h3>
                                    <ul class="list-disc text-gray-600 ml-6 space-y-1">
                                        @foreach(explode(',', $event->event_description) as $description)
                                            <li>{{ trim($description) }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Event Details Sidebar -->
                    <div class="lg:col-span-1">
                        <div class="bg-gray-50 rounded-lg p-6 space-y-4">
                            <div>
                                <h3 class="font-semibold text-gray-800 mb-2">Date & Time</h3>
                                <p class="flex items-center text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ \Carbon\Carbon::parse($event->event_date)->format('l, M d Y h:i A') }} - {{ \Carbon\Carbon::parse($event->event_end_time)->format('h:i A') }}
                                </p>
                            </div>

                            <div>
                                <h3 class="font-semibold text-gray-800 mb-2">Location</h3>
                                <p class="flex items-center text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ $event->event_location }}
                                </p>
                            </div>

                            <div>
                                <h3 class="font-semibold text-gray-800 mb-2">Price</h3>
                                <p class="flex items-center text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    RM {{ number_format($event->event_price, 2) }}
                                </p>
                            </div>

                            <div>
                                <h3 class="font-semibold text-gray-800 mb-2">Capacity</h3>
                                <p class="flex items-center text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    {{ max(0, $event->total_participation) }} slots
                                    @if($event->total_participation <= 0)
                                    <span class="ml-2 inline-block px-2 py-1 text-xs font-semibold text-white bg-red-500 rounded-full">FULLY BOOKED</span>
                                    @elseif($event->total_participation < 10)
                                    <span class="ml-2 inline-block px-2 py-1 text-xs font-semibold text-white bg-yellow-500 rounded-full">LIMITED SPOTS</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Personal Information Form -->
        <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Personal Information</h2>
            <form id="registrationForm" data-event-fee="{{ $event->event_price }}" action="{{ route('event.join', ['id' => $event->event_id]) }}" method="POST">
                @csrf
                <input type="hidden" name="event_name" value="{{ $event->event_name }}" />
                <input type="hidden" name="event_price" value="{{ $event->event_price }}" />
                <input type="hidden" name="event_id" value="{{ $event->event_id }}" />

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                    <!-- Name -->
                    <div class="space-y-2">
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <label class="block text-sm font-medium text-gray-700" for="name">Name</label>
                        </div>
                        <input class="w-full p-2 border border-gray-300 rounded-lg bg-gray-50" 
                               type="text" 
                               id="name" 
                               name="name" 
                               value="{{ auth()->user()->member->name }}" 
                               readonly>
                    </div>

                    <!-- Phone Number -->
                    <div class="space-y-2">
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <label class="block text-sm font-medium text-gray-700" for="phone_number">Phone Number</label>
                        </div>
                        <input class="w-full p-2 border border-gray-300 rounded-lg bg-gray-50" 
                               type="tel" 
                               id="phone_number" 
                               name="phone_number" 
                               value="{{ auth()->user()->member->phone_number }}" 
                               readonly>
                    </div>

                    <!-- Identity Card -->
                    <div class="space-y-2">
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                            </svg>
                            <label class="block text-sm font-medium text-gray-700" for="ic_number">Identity Card</label>
                        </div>
                        <input class="w-full p-2 border border-gray-300 rounded-lg bg-gray-50" 
                               type="text" 
                               id="ic_number" 
                               name="ic_number" 
                               value="{{ auth()->user()->member->ic_number }}" 
                               readonly>
                    </div>

                    <!-- Email -->
                    <div class="space-y-2">
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <label class="block text-sm font-medium text-gray-700" for="email">Email</label>
                        </div>
                        <input class="w-full p-2 border border-gray-300 rounded-lg bg-gray-50" 
                               type="email" 
                               id="email" 
                               name="email" 
                               value="{{ auth()->user()->member->login->email }}" 
                               readonly>
                    </div>
                </div>

                <!-- Register Button -->
                <div class="flex justify-center mt-8">
                    <button type="submit" id="registerButton" 
                            class="inline-flex items-center px-6 py-3 text-lg font-medium rounded-lg text-white
                                   @if($isRegistered || $event->total_participation <= 0) 
                                   bg-gray-500 cursor-not-allowed
                                   @else 
                                   bg-yellow-500 hover:bg-yellow-600 transform hover:-translate-y-0.5 transition-all duration-200
                                   @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        @if($isRegistered)
                            Already Registered
                        @elseif($event->total_participation <= 0)
                            Event Fully Booked
                        @else
                            Register Now
                        @endif
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('member/eventRegistration.js') }}"></script>
    <script>
        function scrollToRegistration() {
            const registrationButton = document.getElementById('registerButton');
            if (registrationButton) {
                registrationButton.scrollIntoView({ behavior: 'smooth' });
            }
        }
    </script>
</x-member-layout>

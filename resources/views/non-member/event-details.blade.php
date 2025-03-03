<x-non-member-layout>
    <div class="flex items-center justify-center min-h-screen p-6">
        <div class="max-w-[60rem] w-full">
            <!-- Header Section -->
            <div class="mb-4 flex items-center">
                <!-- Back Button -->
                <a href="{{ route('non-member.home') }}" class="text-gray-600 hover:text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <h1 class="ml-4 text-2xl font-bold text-gray-800">{{ $event->event_name }}</h1>
            </div>
            
            <!-- Horizontal Line -->
            <hr class="border-gray-300 my-2">
        
            <!-- Event Details Section -->
            <div class="relative">
                <!-- Event Banner -->
                <img src="{{ asset('storage/' . $event->banner) }}" alt="{{ $event->event_name }}" class="w-full h-60 object-cover rounded-lg pb-3" />
        
                <div class="">
                    <!-- Event Information -->
                    <div class="relative">
                        <div class="flex items-center p-2 justify-between">
                            <h1 class="text-2xl font-bold text-gray-800">About this event</h1>
                            <button onclick="scrollToRegistration()" class="w-40 block justify-between">
                                <div class="w-full flex bg-green-500 text-white py-2 px-4 rounded-lg font-medium hover:bg-green-600 transition justify-around items-center">
                                    <!-- Ticket Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 rotate-[135deg]">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                                    </svg>
                                    Register now
                                </div>
                            </button>
                        </div>
                        <hr class="border-gray-300 my-1">
                        
                        <div class="w-full flex justify-between items-start space-x-6">
                            <!-- Event Description -->
                            <div class="m-4 flex-1">
                                <p class="font-semibold">CATEGORY</p>
                                <ul class="list-disc text-sm ml-6"> 
                                    @foreach(explode(',', $event->event_category) as $category)
                                        <li>{{ trim($category) }}</li>
                                    @endforeach
                                </ul>
                                <br>
                                <p class="font-semibold">EVENT DESCRIPTION</p>
                                <ul class="list-disc text-sm ml-6">
                                    @foreach(explode(',', $event->event_description) as $description)
                                        <li>{{ trim($description) }}</li>
                                    @endforeach
                                </ul>                   
                            </div>
        
                            <!-- Date, Time, Location, Capacity -->
                            <div class="border-2 p-4 shadow-md w-80 rounded-lg flex-shrink-0">
                                <p class="font-bold">Date & Time</p>
                                <p class="ml-4 mb-2">
                                    {{ \Carbon\Carbon::parse($event->event_date)->format('l, M d Y h:i A') }} - {{ \Carbon\Carbon::parse($event->event_end_time)->format('h:i A') }}
                                </p>
                                <p class="font-bold">Location</p>
                                <p class="ml-4 mb-2">{{ $event->event_location }}</p>
                                <p class="font-bold">Price</p>
                                <p class="ml-4 mb-2">RM {{ number_format($event->event_price, 2) }}</p>
                                <p class="font-bold">Capacity</p>
                                <p class="ml-4 mb-2">{{ $event->total_participation }} slots</p>
                            </div>
                        </div>
                    </div>
        
                 <!-- Personal Information -->
<div class="w-full items-center content-around">
    <h1 class="mx-4 my-2 text-2xl font-bold text-gray-800">Personal Information</h1>
    <hr class="border-gray-300 my-2">
    
    <form method="POST" action="{{ route('non-member.register', ['id' => $event->event_id]) }}" id="registrationForm">
        @csrf
    
        <!-- First Row -->
        <div class="flex place-content-center justify-evenly">
            <!-- Name -->
            <div class="border-2 border-gray-400 w-3/5 content-around items-center flex-row flex rounded-lg m-2">
                <div class="flex bg-gray-300 h-full w-1/6 items-center justify-center rounded-l-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </div>
                <div class="p-2 w-full border-l-2 border-gray-400">
                    <label class="block text-sm font-medium text-gray-500" for="name">Name</label>
                    <input class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" id="name" name="name" required>
                </div>
            </div>
    
            <!-- Phone Number -->
            <div class="border-2 border-gray-400 w-3/5 content-around items-center flex-row flex rounded-lg m-2">
                <div class="flex bg-gray-300 h-full w-1/6 items-center justify-center rounded-l-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                    </svg>
                </div>
                <div class="p-2 w-full border-l-2 border-gray-400">
                    <label class="block text-sm font-medium text-gray-500" for="phone_number">Phone Number</label>
                    <input class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="tel" id="phone_number" name="phone_number" required>
                </div>
            </div>
        </div>
    
        <!-- Second Row -->
        <div class="flex place-content-center justify-evenly">
            <!-- Identity Card -->
            <div class="border-2 border-gray-400 w-3/5 content-around items-center flex-row flex rounded-lg m-2">
                <div class="flex bg-gray-300 h-full w-1/6 items-center justify-center rounded-l-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                    </svg>
                </div>
                <div class="p-2 w-full border-l-2 border-gray-400">
                    <label class="block text-sm font-medium text-gray-500" for="ic_number">Identity Card</label>
                    <input class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" id="ic_number" name="ic_number" required>
                </div>  
            </div>
    
            <!-- Email -->
            <div class="border-2 border-gray-400 w-3/5 content-around items-center flex-row flex rounded-lg m-2">
                <div class="flex bg-gray-300 h-full w-1/6 items-center justify-center rounded-l-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                </div>
                <div class="p-2 w-full border-l-2 border-gray-400">
                    <label class="block text-sm font-medium text-gray-500" for="email">Email</label>
                    <input class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="email" id="email" name="email" required>
                </div>
            </div>
        </div>
    
        <!-- Submit Button -->
        <div class="m-2 p-2 flex w-full justify-center">
            <button type="submit" class="text-white rounded-lg bg-black hover:bg-green-600 py-3 px-6">
                Register
            </button>
        </div>
    </form>
    
</div>

                    
                </div>
            </div>
        </div>
    </div>
    
    <!-- Add SweetAlert2 for Alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('non-member/NonMemberEventRegister.js') }}"></script>
    <script>
        function scrollToRegistration() {
            const form = document.getElementById('registrationForm');
            if (form) {
                form.scrollIntoView({ behavior: 'smooth' });
            }
        }
    </script>
    
</x-non-member-layout>
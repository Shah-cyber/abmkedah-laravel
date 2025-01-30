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
                <span class="font-medium text-gray-900">12</span>
            </p>
        </div>

        <!-- Activity Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <div class="bg-white border rounded-lg shadow hover:shadow-lg transition">
                <!-- Image Section -->
                <div class="relative">
                    <img
                        src="https://images.pexels.com/photos/976866/pexels-photo-976866.jpeg?auto=compress&cs=tinysrgb&w=600"
                        alt="Finale Concert 2024"
                        class="w-full h-36 object-cover rounded-t-lg"
                    />
                    <!-- Date Box -->
                    <div class="absolute bottom-2 right-2 bg-white text-gray-800 text-center px-4 py-2 rounded-sm shadow border">
                        <p class="text-xs font-semibold">Sep</p> {{---retrieve event_date---}}
                        <p class="text-xs font-semibold">Thu</p> {{---make event_date seperate like this style , p-Month, p-DAY IN THAT DATE(CHECK TTHE DATE WHAT DAY IS)---}}
                        <p class="text-xs font-semibold">14</p> {{---retrieve event_date->---}} {{---retrieve event_date->format('d')---}}
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 ">Finale Concert 2024 </h3>  {{---retrieve event_name---}}
                    <p class="text-sm text-gray-500 mb-3">Astaka Arena, Bukit Jalil</p> {{---retrieve event_location---}}
                    <p class="text-sm text-gray-500 flex items-center font-bold">
                        <!-- Clock Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        7:30PM
                    </p> {{---retrieve event_start_time---}} 
                    <p class="text-sm text-gray-500 flex items-center font-bold">
                        <!-- Ticket Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                        </svg>
                        From: RM 50.00
                    </p> {{---retrieve event_price---}}
                </div>
                <div class="flex items-center p-4 border-t  justify-between">
                    <p class="text-xs text-gray-500">#ConcertEvents</p>
                    <a href="{{ route('member.event-registration', ['id' => 1]) }}" class="w-24 block">
                        <button class="w-full bg-green-500 text-white py-2 px-4 rounded-lg font-medium hover:bg-green-600 transition ">
                            Register
                        </button>
                    </a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white border rounded-lg shadow hover:shadow-lg transition">
                <div class="relative">
                    <img
                        src="https://images.pexels.com/photos/356056/pexels-photo-356056.jpeg?auto=compress&cs=tinysrgb&w=600"
                        alt="Hack-Thorn Data 2024"
                        class="w-full h-36 object-cover rounded-t-lg"
                    />
                    <div class="absolute bottom-2 right-2 bg-white text-gray-800 text-center px-4 py-2 rounded-sm shadow border">
                        <p class="text-xs font-semibold">Sep</p>
                        <p class="text-xs font-semibold">Fri</p>
                        <p class="text-xs font-semibold">15</p>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 ">Hack-Thorn Data 2024</h3>
                    <p class="text-sm text-gray-500 mb-3">Zoom Online</p>
                    <p class="text-sm text-gray-500 flex items-center font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        9:00AM
                    </p>
                    <p class="text-sm text-gray-500 flex items-center font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                        </svg>
                        From: RM 25.00
                    </p>
                </div>
                <div class="flex items-center p-4 border-t  justify-between">
                    <p class="text-xs text-gray-500">#TechnologyEvents</p>
                    <a href="{{ route('member.event-registration', ['id' => 2]) }}" class="w-24 block">
                        <button class="w-full bg-green-500 text-white py-2 px-4 rounded-lg font-medium hover:bg-green-600 transition ">
                            Register
                        </button>
                    </a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white border rounded-lg shadow hover:shadow-lg transition">
                <!-- Image Section -->
                <div class="relative">
                    <img
                        src="https://images.pexels.com/photos/2002209/pexels-photo-2002209.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                        alt="Finale Concert 2024"
                        class="w-full h-36 object-cover rounded-t-lg"
                    />
                    <!-- Date Box -->
                    <div class="absolute bottom-2 right-2 bg-white text-gray-800 text-center px-4 py-2 rounded-sm shadow border">
                        <p class="text-xs font-semibold">Sep</p>
                        <p class="text-xs font-semibold">Thu</p>
                        <p class="text-xs font-semibold">14</p>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 ">SP Half Marathon 2024</h3>
                    <p class="text-sm text-gray-500 mb-3">Dataran Jam Besar</p>
                    <p class="text-sm text-gray-500 flex items-center font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        9:00AM
                    </p>
                    <p class="text-sm text-gray-500 flex items-center font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                        </svg>
                        From: RM 30.00
                    </p>
                </div>
                <div class="flex items-center p-4 border-t  justify-between">
                    <p class="text-xs text-gray-500">#SporecEvents</p>
                    <a href="{{ route('member.event-registration', ['id' => 3]) }}" class="w-24 block">
                        <button class="w-full bg-green-500 text-white py-2 px-4 rounded-lg font-medium hover:bg-green-600 transition ">
                            Register
                        </button>
                    </a>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-white border rounded-lg shadow hover:shadow-lg transition">
                <!-- Image Section -->
                <div class="relative">
                    <img
                        src="https://images.pexels.com/photos/2028187/pexels-photo-2028187.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                        alt="Finale Concert 2024"
                        class="w-full h-36 object-cover rounded-t-lg"
                    />
                    <!-- Date Box -->
                    <div class="absolute bottom-2 right-2 bg-white text-gray-800 text-center px-4 py-2 rounded-sm shadow border">
                        <p class="text-xs font-semibold">Sep</p>
                        <p class="text-xs font-semibold">Thu</p>
                        <p class="text-xs font-semibold">14</p>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 ">Tadarrus Al-Quran Perdana</h3>
                    <p class="text-sm text-gray-500 mb-3">Masjid Besi, Kuala Lumpur</p>
                    <p class="text-sm text-gray-500 flex items-center font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        9:00AM
                    </p>
                    <p class="text-sm text-gray-500 flex items-center font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                        </svg>
                        From: RM 10.00
                    </p>
                </div>
                <div class="flex items-center p-4 border-t  justify-between">
                    <p class="text-xs text-gray-500">#ReligionEvents</p>
                    <a href="{{ route('member.event-registration', ['id' => 4]) }}" class="w-24 block">
                        <button class="w-full bg-green-500 text-white py-2 px-4 rounded-lg font-medium hover:bg-green-600 transition ">
                            Register
                        </button>
                    </a>
                </div> 
            </div>

            <!-- Card 5 -->
            <div class="bg-white border rounded-lg shadow hover:shadow-lg transition">
                <!-- Image Section -->
                <div class="relative">
                    <img
                        src="https://images.pexels.com/photos/1483858/pexels-photo-1483858.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                        alt="Finale Concert 2024"
                        class="w-full h-36 object-cover rounded-t-lg"
                    />
                    <!-- Date Box -->
                    <div class="absolute bottom-2 right-2 bg-white text-gray-800 text-center px-4 py-2 rounded-sm shadow border">
                        <p class="text-xs font-semibold">Sep</p>
                        <p class="text-xs font-semibold">Thu</p>
                        <p class="text-xs font-semibold">14</p>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 ">Food Festival 2024</h3>
                    <p class="text-sm text-gray-500 mb-3">Laman Ilmu, Seksyen 23 Shah Alam</p>
                    <p class="text-sm text-gray-500 flex items-center font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        9:00AM
                    </p>
                    <p class="text-sm text-gray-500 flex items-center font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                        </svg>
                        From: RM 20.00
                    </p>
                </div>
                <div class="flex items-center p-4 border-t  justify-between">
                    <p class="text-xs text-gray-500">#FoodEvents</p>
                    <a href="{{ route('member.event-registration', ['id' => 5]) }}" class="w-24 block">
                        <button class="w-full bg-green-500 text-white py-2 px-4 rounded-lg font-medium hover:bg-green-600 transition ">
                            Register
                        </button>
                    </a>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="bg-white border rounded-lg shadow hover:shadow-lg transition">
                <!-- Image Section -->
                <div class="relative">
                    <img
                        src="https://images.pexels.com/photos/12439941/pexels-photo-12439941.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                        alt="Finale Concert 2024"
                        class="w-full h-36 object-cover rounded-t-lg"
                    />
                    <!-- Date Box -->
                    <div class="absolute bottom-2 right-2 bg-white text-gray-800 text-center px-4 py-2 rounded-sm shadow borderr">
                        <p class="text-xs font-semibold">Sep</p>
                        <p class="text-xs font-semibold">Thu</p>
                        <p class="text-xs font-semibold">14</p>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 ">Hiking Sabahan</h3>
                    <p class="text-sm text-gray-500 mb-3">Gunung Kinabalu</p>
                    <p class="text-sm text-gray-500 flex items-center font-bold">
                        <!-- Clock Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        9:00AM
                    </p>
                    <p class="text-sm text-gray-500 flex items-center font-bold">
                        <!-- Ticket Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                        </svg>
                         From: RM 5900.00
                    </p>
                </div>
                <div class="flex items-center p-4 border-t  justify-between">
                    <p class="text-xs text-gray-500">#HikingEvents</p>
                    <a href="{{ route('member.event-registration', ['id' => 6]) }}" class="w-24 block">
                        <button class="w-full bg-green-500 text-white py-2 px-4 rounded-lg font-medium hover:bg-green-600 transition ">
                            Register
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <!-- Pagination -->
        <div class="flex justify-between items-center mt-6">
            <p class="text-sm text-gray-600">Showing 1 to 10 of 155 entries</p>
            <div class="flex items-center space-x-1">
                <button
                    class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300">
                    Previous
                </button>
                <button
                    class="px-3 py-1 text-sm text-white bg-blue-500 rounded-md hover:bg-blue-600">
                    1
                </button>
                <button
                    class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300">
                    2
                </button>
                <button
                    class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300">
                    3
                </button>
                <button
                    class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300">
                    Next
                </button>
            </div>
        </div>
    </div>

</x-member-layout>
<x-non-member-layout>
    

    @if(session('success'))
        <div id="success-message" style="display: none;">{{ session('success') }}</div>
    @endif

      <!-- Hero Section -->
      <div class="w-full bg-white shadow-sm">
        <div class="container mx-auto p-6">
            <div class="flex flex-col md:flex-row items-center gap-6">
                <div class="md:w-1/2">
                    <h1 class="text-3xl font-bold text-gray-800 mb-4">New Leader are born</h1>
                    <p class="text-gray-600">ABM seeks to develop leadership qualities in youth nationwide by working on impactful initiatives and mentoring future generations.</p>
                </div>
                <div class="md:w-1/2">
                    <img src="https://images.pexels.com/photos/1187086/pexels-photo-1187086.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Leaders" class="rounded-lg shadow-md">
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
                    <span>September 2024</span>
                    <div class="flex gap-2">
                        <button class="text-white hover:text-gray-300">&lt;</button>
                        <button class="text-white hover:text-gray-300">&gt;</button>
                    </div>
                </div>

                <!-- Event List -->
                <div class="divide-y-2 divide-gray-600">
                    <!-- Event Item 1 -->
                    <div class="flex items-center ">
                        <div class="bg-yellow-400 text-center text-white p-6">
                            <span class="block text-sm">Sun</span>
                            <span class="block text-2xl font-bold">1</span>
                        </div>
                        <div class="bg-gray-100 flex-1 p-4">
                            <p class="text-sm font-bold text-gray-900">Marathon Run 2024</p>
                            <p class="text-sm text-gray-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 mr-1 size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                            Likas Sport Complex
                            </p>
                            <p class="text-sm text-gray-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="h-4 w-4 mr-1 size-6">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            6:00AM
                            </p>
                        </div>
                    </div>
                    <!-- end of event item 1 -->

                    <!-- Event Item 2 -->
                    <div class="flex items-center ">
                        <div class="bg-yellow-400 text-center text-white p-6">
                            <span class="block text-sm">Sun</span>
                            <span class="block text-2xl font-bold">1</span>
                        </div>
                        <div class="bg-gray-100 flex-1 p-4">
                            <p class="text-sm font-bold text-gray-900">Kinabalu Hike 2024</p>
                            <p class="text-sm text-gray-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 mr-1 size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                            Kota Kinabalu
                            </p>
                            <p class="text-sm text-gray-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="h-4 w-4 mr-1 size-6">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            6:00AM
                            </p>
                        </div>
                    </div>
                    <!-- end of event item2 -->

                    <!-- Event Item 2 -->
                    <div class="flex items-center ">
                        <div class="bg-yellow-400 text-center text-white p-6">
                            <span class="block text-sm">Sun</span>
                            <span class="block text-2xl font-bold">1</span>
                        </div>
                        <div class="bg-gray-100 flex-1 p-4">
                            <p class="text-sm font-bold text-gray-900">NORCH Badminton tour24</p>
                            <p class="text-sm text-gray-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 mr-1 size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                            KHTP Kulim
                            </p>
                            <p class="text-sm text-gray-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="h-4 w-4 mr-1 size-6">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            9:00AM
                            </p>
                        </div>
                    </div>
                    <!-- end of event item2 -->

                    <!-- Additional Event Items -->
                </div>

                <!-- More Button -->
                <div class="border-t-2 border-gray-600 ">
                    <div class="flex justify-center mt-4">
                        <button class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800">More</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('non-member.footer')
    

    
    
</x-non-member-layout>

<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Include your custom JS file -->



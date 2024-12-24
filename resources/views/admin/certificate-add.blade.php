<x-admin-layout>
    <!-- Header Section -->
    <div class="mb-4 flex items-center">
        <!-- Icon Back Button -->
        <a href="/admin/achievement-certificate" class="text-gray-600 hover:text-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <!-- Title -->
        <h1 class="ml-4 text-2xl font-bold text-gray-800">Add Certificate</h1>
    </div>
    <!-- Horizontal Line -->
    <hr class="border-gray-300 my-2">

    <!-- Form -->
    <div class="mt-4 px-6 py-4 bg-white shadow-lg rounded-lg">
        <form action="#" method="POST" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Select Event -->
                <div>
                    <label for="select-event" class="block text-sm font-medium text-gray-700">Select Event</label>
                    <select
                        id="select-event"
                        name="select-event"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="" selected>Choose</option>
                        <option value="InspireFest 2024">InspireFest 2024</option>
                        <option value="TechVibe Summit">TechVibe Summit</option>
                    </select>
                </div>

                <!-- Number of Participants -->
                <div>
                    <label for="number-of-participants" class="block text-sm font-medium text-gray-700">Number of Participants</label>
                    <div class="mt-1 flex rounded-lg shadow-sm">
                        <input
                            type="number"
                            id="number-of-participants"
                            name="number-of-participants"
                            class="flex-1 block w-full px-3 py-2 border border-gray-300 rounded-r-lg focus:ring-indigo-500 focus:border-indigo-500" placeholder="0" />
                    </div>
                </div>

                <!-- Person In Charge -->
                <div>
                    <label for="race" class="block text-sm font-medium text-gray-700">Person In Charge</label>
                    <input
                        type="text"
                        id="pic"
                        name="pic"
                        value="Admin"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- Phone Number -->
                <div>
                    <label for="religion" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input
                        type="text"
                        id="phone-number"
                        name="phone-number"
                        value="01928873654"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>
            </div>
            <!-- Submit Button -->
            <div class="text-right">
                <button
                    type="submit"
                    class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Add Merit
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
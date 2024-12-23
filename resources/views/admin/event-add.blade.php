<x-admin-layout>
    <!-- Header Section -->
    <div class="mb-4 flex items-center">
        <!-- Icon Back Button -->
        <a href="/admin/event-record" class="text-gray-600 hover:text-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <!-- Title -->
        <h1 class="ml-4 text-2xl font-bold text-gray-800">Add Event</h1>
    </div>
    <!-- Horizontal Line -->
    <hr class="border-gray-300 my-2">

    <!-- Form -->
    <div class="mt-4 px-6 py-4 bg-white shadow-lg rounded-lg">
        <form action="#" method="POST" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Event Name -->
                <div class="md:col-span-2">
                    <label for="event-name" class="block text-sm font-medium text-gray-700">Event Name</label>
                    <input
                        type="text"
                        id="event-name"
                        name="event-name"
                        value=""
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label for="ic-number" class="block text-sm font-medium text-gray-700">Description</label>
                    <input
                        type="text"
                        id="description"
                        name="description"
                        value=""
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- Event banner -->
                <div>
                    <label for="event-banner" class="block text-sm font-medium text-gray-700">Event banner</label>
                    <input
                        type="file"
                        id="event-banner"
                        name="event-banner"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- Total Participants -->
                <div>
                    <label for="total-participant" class="block text-sm font-medium text-gray-700">Total Participants</label>
                    <input
                        type="number"
                        id="total-participant"
                        name="total-participant"
                        value=""
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- Category -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select
                        id="category"
                        name="category"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="private" selected>Private</option>
                        <option value="public">Public</option>
                    </select>
                </div>

                <!-- Event Status -->
                <div>
                    <label for="event-status" class="block text-sm font-medium text-gray-700">Event Status</label>
                    <select
                        id="event-status"
                        name="event-status"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="running" selected>Running</option>
                        <option value="draft">Draft</option>
                        <option value="ended">Ended</option>
                    </select>
                </div>

                <!-- Event Session -->
                <div>
                    <label for="event-session" class="block text-sm font-medium text-gray-700">Event Session</label>
                    <input
                        type="text"
                        id="event-session"
                        name="event-session"
                        value=""
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- Location -->
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                    <input
                        type="text"
                        id="location"
                        name="location"
                        value=""
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- Start Time -->
                <div>
                    <label for="start-time" class="block text-sm font-medium text-gray-700">Start Time</label>
                    <input
                        type="time"
                        id="start-time"
                        name="start-time"
                        value=""
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- End Time -->
                <div>
                    <label for="end-time" class="block text-sm font-medium text-gray-700">End Time</label>
                    <input
                        type="time"
                        id="end-time"
                        name="end-time"
                        value=""
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- Event Date -->
                <div>
                    <label for="event-date" class="block text-sm font-medium text-gray-700">Event Date</label>
                    <input
                        type="date"
                        id="event-date"
                        name="event-date"
                        value=""
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- Amount with Prefix -->
                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                    <div class="mt-1 flex rounded-lg shadow-sm">
                        <span class="inline-flex items-center px-3 rounded-l-lg border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                            RM
                        </span>
                        <input
                            type="number"
                            id="amount"
                            name="amount"
                            step="0.01"
                            class="flex-1 block w-full px-3 py-2 border border-gray-300 rounded-r-lg focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="0.00" />
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-right">
                <button
                    type="submit"
                    class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Add Event
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
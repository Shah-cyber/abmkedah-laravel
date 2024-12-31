<x-admin-layout>
    <!-- Header Section -->
    <div class="mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Event Volunteer</h1>
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

    <!-- Export and Total Members Section -->
    <div class="flex items-center justify-between mb-6">
        <!-- Export Button -->
        <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg font-medium shadow">
            Export List
        </button>
        <!-- Total Members -->
        <p class="text-gray-600">Total Volunteers:
            <span class="font-medium text-gray-900">123</span>
        </p>
    </div>



    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="bg-gray-50 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Event Name</th>
                    <th class="px-4 py-3">Member Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Row 1 -->
                <tr class="border-b">
                    <td class="px-4 py-4">1</td>
                    <td class="px-4 py-4">Robert Fox</td>
                    <td class="px-4 py-4">willie.jennings@example.com</td>
                    <td class="px-4 py-4">Future Forward Forum</td>
                    <td class="px-4 py-4">MFLS</td>
                </tr>
                <!-- Row 2 -->
                <tr class="border-b">
                    <td class="px-4 py-4">2</td>
                    <td class="px-4 py-4">Esther Howard</td>
                    <td class="px-4 py-4">nevaeh.simmons@example.com</td>
                    <td class="px-4 py-4">Visionary Ventures Gala</td>
                    <td class="px-4 py-4">Associated Member</td>
                </tr>
                <!-- Add More Rows as Needed -->
            </tbody>
        </table>
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
</x-admin-layout>
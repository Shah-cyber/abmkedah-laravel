<x-member-layout>
    <!-- Header Section -->
    <div class="mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Achievement List</h1>
        <!-- Horizontal Line -->
        <hr class="border-gray-300 my-2">
    </div>

    <!-- Search Section -->
    <div class="mb-6">
        <div class="relative w-full">
            <input
                type="text"
                class="w-full p-2 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Search achievement">
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
            Total merit: 
            <span class="font-medium text-gray-900">15.0</span>
        </p>
    </div>
    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-md ">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="bg-gray-50 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">event Name</th>
                    <th class="px-4 py-3">Merit</th>
                    <th class="px-4 py-3">certificate</th>
                </tr>
            </thead>
            <tbody>
                <!-- Row 1 -->
                <tr class="border-b">
                    <td class="px-4 py-4">1</td>
                    <td class="px-4 py-4">ABM KEDAH 2024 RETREAT</td>
                    <td class="px-4 py-4">5.00</td>
                    <td class="px-4 py-4 flex space-x-2">
                        <a href="/member/fee-receipt" class="text-black hover:text-blue-500  px-3 py-1 ">View</a>
                    </td>
                </tr>
                <!-- Row 2 -->
                <tr class="border-b">
                    <td class="px-4 py-4">2</td>
                    <td class="px-4 py-4">Norch Badminton</td>
                    <td class="px-4 py-4">5.00</td>
                    <td class="px-4 py-4 flex space-x-2">
                        <a href="/member/fee-receipt" class="text-black hover:text-blue-500  px-3 py-1 ">
                            View
                        </a>
                    </td>
                </tr>
                <!-- Row 3 -->
                <tr class="border-b">
                    <td class="px-4 py-4">3</td>
                    <td class="px-4 py-4">AGM ABM KEDAH</td>
                    <td class="px-4 py-4">5.00</td>
                    <td class="px-4 py-4 flex space-x-2">
                        <a href="/member/fee-receipt" class="text-black hover:text-blue-500  px-3 py-1 ">View</a>
                    </td>
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
</x-member-layout>
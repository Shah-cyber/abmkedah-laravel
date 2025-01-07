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
                        <button
                            data-modal-target="certificateModal"
                            data-modal-toggle="certificateModal"
                            class="text-black hover:text-blue-500 px-3 py-1"
                        >
                            View
                        </button>
                    </td>
                </tr>
                <!-- Row 2 -->
                <tr class="border-b">
                    <td class="px-4 py-4">2</td>
                    <td class="px-4 py-4">Norch Badminton</td>
                    <td class="px-4 py-4">5.00</td>
                    <td class="px-4 py-4 flex space-x-2">
                        <button
                            data-modal-target="certificateModal"
                            data-modal-toggle="certificateModal"
                            class="text-black hover:text-blue-500 px-3 py-1"
                        >
                            View
                        </button>
                    </td>
                </tr>
                <!-- Row 3 -->
                <tr class="border-b">
                    <td class="px-4 py-4">3</td>
                    <td class="px-4 py-4">AGM ABM KEDAH</td>
                    <td class="px-4 py-4">5.00</td>
                    <td class="px-4 py-4 flex space-x-2">
                        <button
                            data-modal-target="certificateModal"
                            data-modal-toggle="certificateModal"
                            class="text-black hover:text-blue-500 px-3 py-1"
                        >
                            View
                        </button>
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

    <!-- Certificate Modal -->
    <div id="certificateModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-64 right-0 z-50 flex items-center justify-center w-[calc(100%-16rem)] p-4 overflow-x-hidden overflow-y-auto h-modal md:h-full hidden bg-black bg-opacity-20">
        <div class="relative w-xs max-w-xs bg-white rounded-lg shadow dark:bg-black-400">
            <!-- Modal Header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <div class="flex justify-center">
                    <a href="https://images.pexels.com/photos/12568133/pexels-photo-12568133.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" download
                       class="px-4 py-2 text-white bg-yellow-500 hover:bg-yellow-700 rounded-lg">
                        Download Certificate
                    </a>
                </div>
                <button
                    type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="certificateModal"
                >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6 space-y-4">
                <img src="https://img.freepik.com/free-vector/stylish-certificate-design_1284-15338.jpg?semt=ais_hybrid" alt="Certificate" class="w-full rounded-lg shadow">
            </div>
        </div>
    </div>

</x-member-layout>
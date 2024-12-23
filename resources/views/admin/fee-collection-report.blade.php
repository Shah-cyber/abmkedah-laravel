<x-admin-layout>
    <!-- Header Section -->
    <div class="mb-4 flex items-center">
        <!-- Icon Back Button -->
        <a href="/admin/fee-collection" class="text-gray-600 hover:text-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <!-- Title -->
        <h1 class="ml-4 text-2xl font-bold text-gray-800">Payment Report</h1>
    </div>
    <!-- Horizontal Line -->
    <hr class="border-gray-300 my-2">

    <!-- Member Information Table -->
    <div class="mb-4 mt-4 overflow-x-auto bg-gray-50 rounded-md shadow-md">
        <table class="table-auto w-full text-sm text-left text-gray-600">
            <tbody>
                <!-- Payment Information Rows -->
                <tr class="border-b">
                    <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">Payment Name</th>
                    <td class="px-4 py-2">ABMK Registration Fee</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">Amount</th>
                    <td class="px-4 py-2">RM20.00</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">Total Collection</th>
                    <td class="px-4 py-2">RM100.00</td>
                </tr>

                <!-- Member Payment Summary Header -->
                <tr class="border-b">
                    <th rowspan="2" class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">Members</th>
                    <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100 text-center">Complete Payment</th>
                    <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100 text-center">Incomplete Payment</th>
                    <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100 text-center">Total</th>
                </tr>

                <!-- Member Payment Summary Data -->
                <tr class="border-b">
                    <td class="px-4 py-2 text-center">RM60.00</td>
                    <td class="px-4 py-2 text-center">RM40.00</td>
                    <td class="px-4 py-2 text-center">RM100.00</td>
                </tr>
            </tbody>
        </table>
    </div>


    <!-- Generate Report -->
    <div class="flex items-center justify-end mb-4">
        <button
            type="button"
            onclick="generatePDF()"
            class="w-fit bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md shadow-sm">
            Generate Report
        </button>
    </div>

    <!-- Achievements Table -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="table-auto w-full text-sm text-left text-gray-600">
            <thead class="bg-gray-100 text-gray-800 uppercase">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Volunteer Name</th>
                    <th class="px-6 py-3">Date</th>
                    <th class="px-6 py-3">Time</th>
                    <th class="px-6 py-3">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="px-6 py-3">1</td>
                    <td class="px-6 py-3">Mountain Quest: Hiking Adventure</td>
                    <td class="px-6 py-3">4.0</td>
                    <td class="px-6 py-3 text-blue-500 cursor-pointer hover:underline">
                        <a href="/path-to-certificate.pdf" target="_blank">View</a>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="px-6 py-3">2</td>
                    <td class="px-6 py-3">Run for Health: Charity Sport Run</td>
                    <td class="px-6 py-3">8.5</td>
                    <td class="px-6 py-3 text-gray-400">-</td>
                </tr>
                <tr class="border-b">
                    <td class="px-6 py-3">3</td>
                    <td class="px-6 py-3">Khatam al-Quran Ceremony: A Spiritual Milestone</td>
                    <td class="px-6 py-3">3.0</td>
                    <td class="px-6 py-3 text-blue-500 cursor-pointer hover:underline">
                        <a href="/path-to-certificate.pdf" target="_blank">View</a>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-3">4</td>
                    <td class="px-6 py-3">Hari Raya Fest: Unity and Celebration</td>
                    <td class="px-6 py-3">14.5</td>
                    <td class="px-6 py-3 text-blue-500 cursor-pointer hover:underline">
                        <a href="/path-to-certificate.pdf" target="_blank">View</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- JavaScript to Handle PDF Generation -->
    <script>
        function generatePDF() {
            // Replace with actual logic for PDF generation
            alert('Generating PDF...');
        }
    </script>
</x-admin-layout>
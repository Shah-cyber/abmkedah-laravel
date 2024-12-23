<x-admin-layout>
    <!-- Header Section -->
    <div class="mb-4 flex items-center">
        <!-- Icon Back Button -->
        <a href="/admin/member-record" class="text-gray-600 hover:text-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <!-- Title -->
        <h1 class="ml-4 text-2xl font-bold text-gray-800">Member Achievement</h1>
    </div>
    <!-- Horizontal Line -->
    <hr class="border-gray-300 my-2">

    <!-- Member Information Table -->
    <div class="mb-4 mt-4 overflow-x-auto bg-gray-50 rounded-md shadow-md">
        <table class="table-auto w-full text-sm text-left text-gray-600">
            <tbody>
                <tr>
                    <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">Full Name</th>
                    <td class="px-4 py-2">Albert Flores</td>
                </tr>
                <tr>
                    <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">IC Number</th>
                    <td class="px-4 py-2">910202025432</td>
                </tr>
                <tr>
                    <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">Member Status</th>
                    <td class="px-4 py-2">Associate Member</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Select Session and Generate Button -->
    <div class="mb-4">
        <div class="flex justify-between items-center gap-4">
            <!-- Select Session -->
            <div class="flex-1">
                <label class="block text-sm font-semibold text-gray-600 mb-1">Select Session</label>
                <select class="w-full border border-gray-300 text-gray-600 rounded-md shadow-sm p-2 focus:ring focus:ring-yellow-300">
                    <option>Select Session</option>
                    <option>2023</option>
                    <option>2022</option>
                    <option>2021</option>
                </select>
            </div>
            <!-- Total Merit -->
            <div class="flex-1">
                <label class="block text-sm font-semibold text-gray-600 mb-1">Total Merit</label>
                <div class="bg-gray-100 p-2 rounded-md shadow-sm text-gray-800">23.00</div>
            </div>
        </div>
    </div>
    <!-- Generate Achievement Button -->
    <div class="flex items-center justify-end mb-6">
        <button
            type="button"
            onclick="generatePDF()"
            class="w-fit bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md shadow-sm">
            Generate Achievement
        </button>
    </div>

    <!-- Achievements Table -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="table-auto w-full text-sm text-left text-gray-600">
            <thead class="bg-gray-100 text-gray-800 uppercase">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Event Name</th>
                    <th class="px-6 py-3">Merit</th>
                    <th class="px-6 py-3">Certificate</th>
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
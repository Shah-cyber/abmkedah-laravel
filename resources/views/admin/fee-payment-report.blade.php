<x-admin-layout>
    <!-- Header Section -->
    <div class="mb-4 flex items-center">
        <!-- Icon Back Button -->
        <a href="/admin/fee-payment" class="text-gray-600 hover:text-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <!-- Title -->
        <h1 class="ml-4 text-2xl font-bold text-gray-800">Fee Payment Report</h1>
    </div>
    <!-- Horizontal Line -->
    <hr class="border-gray-300 my-2">

    <!-- Payment Information Table -->
    <div class="mb-4 mt-4 overflow-x-auto bg-gray-50 rounded-md shadow-md">
        <table class="table-auto w-full text-sm text-left text-gray-600">
            <tbody>
                <tr class="border-b">
                    <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">Event Name</th>
                    <td class="px-4 py-2">Mountain Quest: Hiking Adventure</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">Amount</th>
                    <td class="px-4 py-2">RM35.00</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">Total Collection</th>
                    <td class="px-4 py-2">RM175.00</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Generate Achievement Button -->
    <div class="flex items-center justify-end mb-6">
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
                    <td class="px-6 py-3">Leslie Alexander</td>
                    <td class="px-6 py-3">07/05/2016</td>
                    <td class="px-6 py-3">23:18:33</td>
                    <td class="px-6 py-3">MFLS Alumni</td>
                </tr>
                <tr class="border-b">
                    <td class="px-6 py-3">2</td>
                    <td class="px-6 py-3">Wade Warren</td>
                    <td class="px-6 py-3">18/09/2016</td>
                    <td class="px-6 py-3">17:27:17</td>
                    <td class="px-6 py-3">Associate Member</td>
                </tr>
                <tr class="border-b">
                    <td class="px-6 py-3">3</td>
                    <td class="px-6 py-3">Savannah Nguyen</td>
                    <td class="px-6 py-3">16/08/2013</td>
                    <td class="px-6 py-3">05:30:21</td>
                    <td class="px-6 py-3">Associate Member</td>
                </tr>
                <tr>
                    <td class="px-6 py-3">4</td>
                    <td class="px-6 py-3">Darrell Steward</td>
                    <td class="px-6 py-3">28/10/2012</td>
                    <td class="px-6 py-3">13:11:35</td>
                    <td class="px-6 py-3">MFLS Alumni</td>
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
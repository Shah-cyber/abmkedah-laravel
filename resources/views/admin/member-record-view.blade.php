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
        <h1 class="ml-4 text-2xl font-bold text-gray-800">Member Information</h1>
    </div>
    <!-- Horizontal Line -->
    <hr class="border-gray-300 my-2">

    <!-- Generate Profile Button -->
    <div class="flex items-center justify-end mb-4 mt-4">
        <button
            type="button"
            onclick="generatePDF()"
            class="w-fit bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md shadow-sm">
            Generate Profile
        </button>
    </div>

    <!-- Member Information Table -->
    <div class="mb-4 mt-4 overflow-x-auto bg-gray-50 rounded-md shadow-md">
        <table class="table-auto w-full text-sm text-left text-gray-600">
            <tbody>
                <tr class="border-b">
                    <th class="px-4 py-2 w-1/3 text-gray-800 font-semibold bg-gray-100">Full Name</th>
                    <td class="px-4 py-2">Albert Flores</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 w-1/3 text-gray-800 font-semibold bg-gray-100">IC Number</th>
                    <td class="px-4 py-2">910202025432</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 w-1/3 text-gray-800 font-semibold bg-gray-100">Gender</th>
                    <td class="px-4 py-2">Male</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 w-1/3 text-gray-800 font-semibold bg-gray-100">Race</th>
                    <td class="px-4 py-2">Malay</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 w-1/3 text-gray-800 font-semibold bg-gray-100">Age</th>
                    <td class="px-4 py-2">21</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 w-1/3 text-gray-800 font-semibold bg-gray-100">Religion</th>
                    <td class="px-4 py-2">Islam</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 w-1/3 text-gray-800 font-semibold bg-gray-100">Birth Date</th>
                    <td class="px-4 py-2">2/12/2014</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 w-1/3 text-gray-800 font-semibold bg-gray-100">Birth Place</th>
                    <td class="px-4 py-2">Mount Sinai Hospital</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 w-1/3 text-gray-800 font-semibold bg-gray-100">Home Address</th>
                    <td class="px-4 py-2">1901 Thornridge Cir. Shiloh, Hawaii 81063</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 w-1/3 text-gray-800 font-semibold bg-gray-100">Email</th>
                    <td class="px-4 py-2">albertflores@example.comr</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 w-1/3 text-gray-800 font-semibold bg-gray-100">Member Status</th>
                    <td class="px-4 py-2">MFLS Alumni</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 w-1/3 text-gray-800 font-semibold bg-gray-100">Phone Number</th>
                    <td class="px-4 py-2">0197386621</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 w-1/3 text-gray-800 font-semibold bg-gray-100">Proof of Participation</th>
                    <td class="px-4 py-2 text-blue-500 cursor-pointer hover:underline">
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
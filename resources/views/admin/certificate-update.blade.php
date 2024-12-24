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
        <h1 class="ml-4 text-2xl font-bold text-gray-800">Update Certificate</h1>
    </div>
    <!-- Horizontal Line -->
    <hr class="border-gray-300 my-2">

    <!-- Member Information Table -->
    <div class="mb-4 mt-4 overflow-x-auto bg-gray-50 rounded-md shadow-md">
        <table class="table-auto w-full text-sm text-left text-gray-600">
            <tbody>
                <tr class="border-b">
                    <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">Event Name</th>
                    <td class="px-4 py-2">TechVIbe Summits</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">Event Date</th>
                    <td class="px-4 py-2">12/10/2024</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">Session</th>
                    <td class="px-4 py-2">2024</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">Number of Participants</th>
                    <td class="px-4 py-2">15</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Search Section -->
    <div class="mb-4">
        <div class="relative w-full">
            <input type="text" class="w-full p-2 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Search">
            <svg xmlns="http: //www.w3.org/2000/svg" class="absolute left-3 top-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 4a4 4 0 100 8 4 4 0 000-8zM21 21l-5.197-5.197">
                </path>
            </svg>
        </div>
    </div>

    <!-- Generate Achievement Button -->
    <div class="flex justify-end mb-6">
        <button
            type="button"
            class="w-fit bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md shadow-sm">
            Allocate Certificate
        </button>
    </div>

    <!-- Achievements Table -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="table-auto w-full text-sm text-left text-gray-600">
            <thead class="bg-gray-100 text-gray-800 uppercase">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Volunteer Name</th>
                    <th class="px-6 py-3">Certificate</th>
                    <th class="px-6 py-3">Member Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="px-6 py-3">1</td>
                    <td class="px-6 py-3">Leslie Alexander</td>
                    <td class="px-6 py-3 text-center">
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="file" class="hidden" id="upload-leslie-alexander" accept=".jpg,.jpeg,.png" onchange="previewImage(event, 'preview-link-leslie-alexander', 'preview-img-leslie-alexander')" />
                            <span class="text-blue-500 hover:text-blue-600">Upload</span>
                        </label>
                        <div class="mt-2">
                            <a id="preview-link-leslie-alexander" href="#" target="_blank" style="display: none;">
                                <img id="preview-img-leslie-alexander" src="" alt="Preview" class="h-16 w-16 object-cover rounded-md border" />
                            </a>
                        </div>
                    </td>
                    <td class="px-6 py-3">MFLS Alumni</td>
                </tr>
                <tr class="border-b">
                    <td class="px-6 py-3">2</td>
                    <td class="px-6 py-3">Wade Warren</td>
                    <td class="px-6 py-3 text-center">
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="file" class="hidden" id="upload-leslie-warren" accept=".jpg,.jpeg,.png" onchange="previewImage(event, 'preview-link-leslie-warren', 'preview-img-leslie-warren')" />
                            <span class="text-blue-500 hover:text-blue-600">Upload</span>
                        </label>
                        <div class="mt-2">
                            <a id="preview-link-leslie-warren" href="#" target="_blank" style="display: none;">
                                <img id="preview-img-leslie-warren" src="" alt="Preview" class="h-16 w-16 object-cover rounded-md border" />
                            </a>
                        </div>
                    </td>
                    <td class="px-6 py-3">Associate Member</td>
                </tr>
                <tr class="border-b">
                    <td class="px-6 py-3">3</td>
                    <td class="px-6 py-3">Savannah Nguyen</td>
                    <td class="px-6 py-3 text-center">
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="file" class="hidden" id="upload-leslie-nguyen" accept=".jpg,.jpeg,.png" onchange="previewImage(event, 'preview-link-leslie-nguyen', 'preview-img-leslie-nguyen')" />
                            <span class="text-blue-500 hover:text-blue-600">Upload</span>
                        </label>
                        <div class="mt-2">
                            <a id="preview-link-leslie-nguyen" href="#" target="_blank" style="display: none;">
                                <img id="preview-img-leslie-nguyen" src="" alt="Preview" class="h-16 w-16 object-cover rounded-md border" />
                            </a>
                        </div>
                    </td>
                    <td class="px-6 py-3">Associate Member</td>
                </tr>
                <tr>
                    <td class="px-6 py-3">4</td>
                    <td class="px-6 py-3">Darrell Steward</td>
                    <td class="px-6 py-3 text-center">
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="file" class="hidden" id="upload-leslie-steward" accept=".jpg,.jpeg,.png" onchange="previewImage(event, 'preview-link-leslie-steward', 'preview-img-leslie-steward')" />
                            <span class="text-blue-500 hover:text-blue-600">Upload</span>
                        </label>
                        <div class="mt-2">
                            <a id="preview-link-leslie-steward" href="#" target="_blank" style="display: none;">
                                <img id="preview-img-leslie-steward" src="" alt="Preview" class="h-16 w-16 object-cover rounded-md border" />
                            </a>
                        </div>
                    </td>
                    <td class="px-6 py-3">MFLS Alumni</td>
                </tr>
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

    <script>
        function previewImage(event, linkId, imageId) {
            const fileInput = event.target;
            const file = fileInput.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Update the image source
                    const imgElement = document.getElementById(imageId);
                    imgElement.src = e.target.result;

                    // Update the link href
                    const linkElement = document.getElementById(linkId);
                    linkElement.href = e.target.result;

                    // Make both visible
                    linkElement.style.display = "block";
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-admin-layout>
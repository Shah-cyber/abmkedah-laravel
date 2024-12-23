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
        <h1 class="ml-4 text-2xl font-bold text-gray-800">Update Information</h1>
    </div>
    <!-- Horizontal Line -->
    <hr class="border-gray-300 my-2">
    <div class="px-6 py-4 bg-white shadow-lg rounded-lg">
        <form action="#" method="POST" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Full Name -->
                <div class="md:col-span-2">
                    <label for="full-name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input
                        type="text"
                        id="full-name"
                        name="full-name"
                        value="Albert Flores"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- IC Number -->
                <div>
                    <label for="ic-number" class="block text-sm font-medium text-gray-700">IC Number</label>
                    <input
                        type="text"
                        id="ic-number"
                        name="ic-number"
                        value="910202025432"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- Age -->
                <div>
                    <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                    <input
                        type="number"
                        id="age"
                        name="age"
                        value="23"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- Race -->
                <div>
                    <label for="race" class="block text-sm font-medium text-gray-700">Race</label>
                    <input
                        type="text"
                        id="race"
                        name="race"
                        value="Malay"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- Religion -->
                <div>
                    <label for="religion" class="block text-sm font-medium text-gray-700">Religion</label>
                    <input
                        type="text"
                        id="religion"
                        name="religion"
                        value="Islam"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- Gender -->
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <input
                        type="text"
                        id="gender"
                        name="gender"
                        value="Male"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- Phone Number -->
                <div>
                    <label for="phone-number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input
                        type="text"
                        id="phone-number"
                        name="phone-number"
                        value="0182379045"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- Birth Place -->
                <div>
                    <label for="birth-place" class="block text-sm font-medium text-gray-700">Birth Place</label>
                    <input
                        type="text"
                        id="birth-place"
                        name="birth-place"
                        value="HHC Bellevue Hospital Center"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- Birth Date -->
                <div>
                    <label for="birth-date" class="block text-sm font-medium text-gray-700">Birth Date</label>
                    <input
                        type="date"
                        id="birth-date"
                        name="birth-date"
                        value="20/12/2024"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- Address -->
                <div class="md:col-span-2">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input
                        type="text"
                        id="address"
                        name="address"
                        value="4140 Parker Rd. Allentown, New Mexico 31134"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- User Status -->
                <div>
                    <label for="user-status" class="block text-sm font-medium text-gray-700">User Status</label>
                    <select
                        id="user-status"
                        name="user-status"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="associate-member" selected>Associate Member</option>
                        <option value="regular-member">MFLS</option>
                    </select>
                </div>

                <!-- Proof of Participation -->
                <div>
                    <label for="proof-file" class="block text-sm font-medium text-gray-700">Proof of Participation</label>
                    <input
                        type="file"
                        id="proof-file"
                        name="proof-file"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-right">
                <button
                    type="submit"
                    class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Save
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
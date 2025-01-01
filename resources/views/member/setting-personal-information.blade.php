<x-member-layout>
    <div class="mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Account Settings</h1>
        <!-- Horizontal Line -->
        <hr class="border-gray-300 my-2">
    </div>

    <!-- Tabs Section -->
    <div class="mb-6">
        <ul class="flex border-b">
            <li class="mr-4">
                <a href="/member/setting" class="inline-block py-2 px-4  border-b-2  font-semibold">
                    Account
                </a>
            </li>
            <li class="mr-4">
                <a href="/member/setting-personal" class="inline-block py-2 px-4 text-yellow-500 border-b-2 border-yellow-500 font-semibold">
                    Personal information
                </a>
            </li>
        </ul>
    </div>

    <!-- Admin Settings Content -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Left Column: Account Details -->
        <div class="md:col-span-2 bg-white shadow-md rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-2">Your Personal information</h2>
            <hr class="border-gray-300 my-2 mb-4">
            <form action="#" method="POST" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                    <!-- Full Name -->
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Full name</label>
                        <input
                            type="text"
                            id="full_name"
                            name="full_name"
                            value="Amin Idris Bin Abdul Karim"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- IC number -->
                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700">IC Number</label>
                            <input
                                type="text"
                                id="IC_Number"
                                name="IC_Number"
                                value="030813-12-1209"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <!-- Age -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Age</label>
                            <input
                                type="number"
                                id="age"
                                name="age"
                                value="21"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <!-- Race -->
                        <div class="relative">
                            <label for="password" class="block text-sm font-medium text-gray-700">Race</label>
                            <input
                                type="text"
                                id="race"
                                name="race"
                                value="Malay"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <!-- Gender -->
                        <div class="relative">
                            <label for="password" class="block text-sm font-medium text-gray-700">Gender</label>
                            <input
                                type="text"
                                id="gender"
                                name="gender"
                                value="Male"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <!-- Religion -->
                        <div class="relative">
                            <label for="password" class="block text-sm font-medium text-gray-700">Religion</label>
                            <input
                                type="text"
                                id="religion"
                                name="religion"
                                value="Islam"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <!-- Phone Number -->
                        <div class="relative">
                            <label for="password" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <input
                                type="tel"
                                id="phone_num"
                                name="phone_num"
                                value="0182379045"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <!-- Birth Place -->
                        <div class="relative">
                            <label for="password" class="block text-sm font-medium text-gray-700">Birth Place</label>
                            <input
                                type="text"
                                id="birth_place"
                                name="birth_place"
                                value="HHC Bellevue Hospital center"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <!-- Birth Date -->
                        <div class="relative">
                            <label for="password" class="block text-sm font-medium text-gray-700">Birth Date</label>
                            <input
                                type="text"
                                id="birth_date"
                                name="birth_date"
                                value="13 August 2003"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>
                    <!-- Address -->
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Address</label>
                        <input
                            type="text"
                            id="Address"
                            name="Address"
                            value="4140 Parker Rd. Allentown New Mexico 31134"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-left">
                    <button
                        type="submit"
                        class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>
            </form>
        </div>

        <!-- Right Column: Profile Section -->
        <div class="bg-white shadow-md rounded-lg p-6 text-center self-start">
            <h2 class="text-lg font-semibold text-gray-800 mb-2 text-left">My Profile</h2>
            <hr class="border-gray-300 my-2 mb-4">
            <!-- Avatar -->
            <div class="relative w-24 h-24 mx-auto mb-4">
                <img
                    src=" https://randomuser.me/api/portraits/men/3.jpg"
                    alt="Profile Avatar"
                    class="w-24 h-24 rounded-full border" />
            </div>
            <!-- Change Avatar -->
            <button
                type="button"
                class="w-full bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md mb-2">
                Change Avatar
            </button>
            <!-- Delete Account -->
            <button
                type="button"
                class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">
                Delete Account
            </button>
        </div>
    </div>
</x-member-layout>
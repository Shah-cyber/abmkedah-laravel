
<x-member-layout>
    <div class="mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Account Settings</h1>
        <!-- Horizontal Line -->
        <hr class="border-gray-300 my-2">
    </div>

    <!-- Tabs Section -->
    <div class="mb-6">
        <ul class="flex border-b">
            <!-- Account Tab -->
            <li class="mr-4">
                <a href="{{ route('member.setting') }}" 
                   class="inline-block py-2 px-4 {{ request()->routeIs('member.setting') ? 'text-yellow-500 border-b-2 border-yellow-500 font-semibold' : 'font-semibold' }}">
                    Account
                </a>
            </li>
            <!-- Personal Information Tab -->
            <li class="mr-4">
                <a href="{{ route('member.setting-personal') }}" 
                   class="inline-block py-2 px-4 {{ request()->routeIs('member.setting-personal') ? 'text-yellow-500 border-b-2 border-yellow-500 font-semibold' : 'font-semibold' }}">
                    Personal Information
                </a>
            </li>
        </ul>
    </div>
    

    <!-- Admin Settings Content -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Left Column: Account Details -->
        <div class="md:col-span-2 bg-white shadow-md rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-2">Your Account Details</h2>
            <hr class="border-gray-300 my-2 mb-4">
            <form action="#" method="POST" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Username -->
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <input
                            type="text"
                            id="username"
                            name="username"
                            value="Akash2411"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="akash2411@gmail.com"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                    </div>

                    <!-- Password -->
                    <div class="relative">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            value="akash123123"
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
        <div class="bg-white shadow-md rounded-lg p-6 text-center">
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

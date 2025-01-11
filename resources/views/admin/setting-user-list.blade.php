<x-admin-layout>
    <!-- Header Section -->
    <div class="mb-4">
        <h1 class="text-2xl font-bold text-gray-800">User Settings</h1>
        <!-- Horizontal Line -->
        <hr class="border-gray-300 my-2">
    </div>

    <!-- Search Section -->
    <div class="mb-6">
        <div class="relative w-full">
            <input
                type="text"
                class="w-full p-2 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Search">
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

     <!-- Export and Total Members Section -->
     <div class="flex items-center justify-between mb-6">
        <a href="{{ route('admin.setting.users.add') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg font-medium shadow">
            Add Admin
        </a>
        <p class="text-gray-600">Total Users:
            <span class="font-medium text-gray-900">{{ $users->total() }}</span>
        </p>
    </div>
 


      <!-- Table -->
      <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="bg-gray-50 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Username</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Role</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                    <tr class="border-b">
                        <td class="px-4 py-4">{{ $index + 1 }}</td>
                        <td class="px-4 py-4">{{ $user->username }}</td>
                        <td class="px-4 py-4">{{ $user->email }}</td>
                        <td class="px-4 py-4">{{ $user->user_role }}</td>
                        <td class="px-4 py-4">
                            @if($user->acc_status == 'active')
                                <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                    <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                                    Active
                                </span>
                            @else
                                <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                    <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
                                    Deactivate
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-4 flex space-x-2">
                            <a href="{{ route('admin.setting.users.update', ['id' => $user->user_type == 'admin' ? $user->admin_id : $user->member_id]) }}" 
                               class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded-md">
                                Update
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-between items-center mt-6">
        <p class="text-sm text-gray-600">
            Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries
        </p>
        <div class="flex items-center space-x-1">
            @if($users->onFirstPage())
                <button class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md cursor-not-allowed">
                    Previous
                </button>
            @else
                <a href="{{ $users->previousPageUrl() }}" class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300">
                    Previous
                </a>
            @endif

            @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                @if ($page == $users->currentPage())
                    <button class="px-3 py-1 text-sm text-white bg-blue-500 rounded-md">
                        {{ $page }}
                    </button>
                @else
                    <a href="{{ $url }}" class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300">
                        {{ $page }}
                    </a>
                @endif
            @endforeach

            @if($users->hasMorePages())
                <a href="{{ $users->nextPageUrl() }}" class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300">
                    Next
                </a>
            @else
                <button class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md cursor-not-allowed">
                    Next
                </button>
            @endif
        </div>
    </div>
</x-admin-layout>
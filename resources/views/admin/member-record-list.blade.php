<x-admin-layout>
    <!-- Header Section -->
    <div class="mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Member Record</h1>
        <!-- Horizontal Line -->
        <hr class="border-gray-300 my-2">
    </div>

    <!-- Search Section -->
    <div class="mb-6">
        <div class="relative w-full">
            <input
                type="text"
                class="w-full p-2 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Search member">
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
        <!-- Export Button -->
        <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg font-medium shadow">
            Export List
        </button>
        <!-- Total Members -->
        <p class="text-gray-600">Total Members:
            <span class="font-medium text-gray-900">{{ $members->total() }}</span>
        </p>
    </div>

 
 <!-- Table -->
 <div class="overflow-x-auto bg-white rounded-lg shadow-md">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="bg-gray-50 text-gray-700 uppercase text-xs">
            <tr>
                <th class="px-4 py-3">#</th>
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3">Achievement</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($members as $index => $member)
                <tr class="border-b">
                    <td class="px-4 py-4">{{ $loop->iteration }}</td>
                    <td class="px-4 py-4">{{ $member->name }}</td>
                    <td class="px-4 py-4">{{ $member->login->email }}</td>
                    <td class="px-4 py-4">
                        <a href="{{ route('admin.member.record.report', $member->member_id) }}" 
                            class="text-blue-500 hover:underline cursor-pointer">Report</a>
                    </td>
                    <td class="px-4 py-4">{{ $member->member_status }}</td>
                    <td class="px-4 py-4 flex space-x-2">
                        <a href="{{ route('admin.member.record.view', $member->member_id) }}" 
                           class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md">View</a>
                           <a href="{{ route('admin.member.record.edit', $member->member_id) }}" 
                            class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded-md">Update</a>
                        <a class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md cursor-pointer" onclick="deleteMember({{ $member->member_id }})">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-4 text-center text-gray-500">No members found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>



    <!-- Pagination -->
    <div class="flex justify-between items-center mt-6">
        <p class="text-sm text-gray-600">
            Showing {{ $members->firstItem() }} to {{ $members->lastItem() }} of {{ $members->total() }} entries
        </p>
        <div class="flex items-center space-x-1">
            <button onclick="changePage({{ $members->currentPage() - 1 }})"
                {{ $members->onFirstPage() ? 'disabled' : '' }}
                class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">
                Previous
            </button>

            @for ($i = 1; $i <= $members->lastPage(); $i++)
                <button onclick="changePage({{ $i }})"
                    class="px-3 py-1 text-sm {{ $members->currentPage() == $i ? 'text-white bg-blue-500 hover:bg-blue-600' : 'text-gray-500 bg-gray-200 hover:bg-gray-300' }} rounded-md">
                    {{ $i }}
                </button>
            @endfor

            <button onclick="changePage({{ $members->currentPage() + 1 }})"
                {{ $members->hasMorePages() ? '' : 'disabled' }}
                class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">
                Next
            </button>
        </div>
    </div>

    <script>
        function changePage(page) {
            // Get current URL
            let url = new URL(window.location.href);
            
            // Update or add the page parameter
            url.searchParams.set('page', page);
            
            // Redirect to new URL
            window.location.href = url.toString();
        }
    </script>
    <!-- Hidden Success and Error Messages -->
    @if(session('success'))
    <div id="success-message" style="display: none;">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div id="error-message" style="display: none;">{{ implode(', ', $errors->all()) }}</div>
    @endif

    <!-- Add SweetAlert2 script -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script src="{{ asset('admin/adminMemberRecord.js') }}"></script>
 <!-- Hidden Success and Error Messages -->
            @if(session('success'))
                <div id="success-message" style="display: none;">{{ session('success') }}</div>
            @endif
            
            @if($errors->any())
                <div id="error-message" style="display: none;">{{ implode(', ', $errors->all()) }}</div>
            @endif
</x-admin-layout>
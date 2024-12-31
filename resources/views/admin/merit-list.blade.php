<x-admin-layout>
    <!-- Header Section -->
    <div class="mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Merit List</h1>
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
        <!-- Export Button -->
        <a href="/admin/achievement-merit/add" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg font-medium shadow">
            Add Merit
        </a>
        <!-- Total Members -->
        <p class="text-gray-600">Total Merit:
            <span class="font-medium text-gray-900">{{ $merits->total() }}</span> <!-- Use total() to get the count of all records -->
        </p>
    </div>



     <!-- Table -->
     <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="bg-gray-50 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">No.</th>
                    <th class="px-4 py-3 w-2/5">Event Name</th>
                    <th class="px-4 py-3">Allocation Date</th>
                    <th class="px-4 py-3">Merit</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($merits as $index => $merit)
                    <tr class="border-b">
                        <td class="px-4 py-4">{{ $index + 1 + ($merits->currentPage() - 1) * $merits->perPage() }}</td>
                        <td class="px-4 py-4">{{ $merit->event->event_name ?? 'N/A' }}</td>
                        <td class="px-4 py-4">{{ \Carbon\Carbon::parse($merit->allocation_date)->format('d/m/Y') }}</td>
                        <td class="px-4 py-4">{{ $merit->merit_point }}</td>
                        <td class="px-4 py-4 flex space-x-2">
                            <a href="/admin/achievement-merit/update/{{ $merit->merit_id }}" class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded-md">Update</a>
                            <form action="{{ route('merit.delete', $merit->merit_id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE') <!-- Specify the method for deletion -->
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

   <!-- Pagination -->
    <div class="flex justify-between items-center mt-6">
        @if ($merits->hasPages())
            <div class="flex justify-between items-center mt-6">
                @if ($merits->onFirstPage())
                    <button class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md cursor-not-allowed" disabled>
                        Previous
                    </button>
                @else
                    <a href="{{ $merits->previousPageUrl() }}" class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300">
                        Previous
                    </a>
                @endif

                <div class="flex items-center space-x-1">
                    @foreach ($merits->links()->elements as $element)
                        @if (is_string($element))
                            <span class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md">{{ $element }}</span>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $merits->currentPage())
                                    <span class="px-3 py-1 text-sm text-white bg-blue-500 rounded-md">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>

                @if ($merits->hasMorePages())
                    <a href="{{ $merits->nextPageUrl() }}" class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300">
                        Next
                    </a>
                @else
                    <button class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md cursor-not-allowed" disabled>
                        Next
                    </button>
                @endif
            </div>
        @endif 
    </div>

      <!-- Hidden Success and Error Messages -->
            @if(session('success'))
            <div id="success-message" style="display: none;">{{ session('success') }}</div>
        @endif
        
        @if($errors->any())
            <div id="error-message" style="display: none;">{{ implode(', ', $errors->all()) }}</div>
        @endif



    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom JavaScript to handle messages -->
    <script src="{{ asset('admin/adminMerit.js') }}"></script>
</x-admin-layout>
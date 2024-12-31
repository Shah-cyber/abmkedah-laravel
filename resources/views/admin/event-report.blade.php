<x-admin-layout>
    <!-- Header Section -->
    <div class="mb-4 flex items-center">
        <!-- Icon Back Button -->
        <a href="/admin/event-record" class="text-gray-600 hover:text-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <!-- Title -->
        <h1 class="ml-4 text-2xl font-bold text-gray-800">Event Report</h1>
    </div>
    <!-- Horizontal Line --> 
    <hr class="border-gray-300 my-2"> 

    <!-- Event Information Table -->
    <div class="mb-4 mt-4 overflow-x-auto bg-gray-50 rounded-md shadow-md">
        <table class="table-auto w-full text-sm text-left text-gray-600">
            <tbody>
                <tr class="border-b">
                    <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">Event Name</th>
                    <td class="px-4 py-2">{{ $event->event_name }}</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">Event Date</th>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($event->event_date)->format('d/m/Y') }}</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">Session</th>
                    <td class="px-4 py-2">{{ $event->event_session }}</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">Member Involved</th>
                    <td class="px-4 py-2">{{ $totalParticipants }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Search Section -->
    {{-- <div class="mb-4">
        <div class="relative w-full">
            <input type="text" class="w-full p-2 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Search">
            <svg xmlns="http: //www.w3.org/2000/svg" class="absolute left-3 top-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 4a4 4 0 100 8 4 4 0 000-8zM21 21l-5.197-5.197">
                </path>
            </svg>
        </div>
    </div> --}}
    <!-- Search Section -->
    <div class="mb-4">
        <div class="relative w-full">
            <input id="search-input" type="text" class="w-full p-2 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Search">
            <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 4a4 4 0 100 8 4 4 0 000-8zM21 21l-5.197-5.197"></path>
            </svg>
        </div>
    </div>

    <!-- Generate Achievement Button -->
   <!-- Generate Achievement Button -->
    <div class="flex justify-between mb-6">
        <button
            type="button"
            onclick="generatePDF()"
            class="w-fit bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md shadow-sm">
            Generate Report
        </button>
        <button
            type="button"
            onclick="submitSelected()"
            class="w-fit bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md shadow-sm">
            Allocate Merit
        </button>
    </div>

       <!-- Achievements Table -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="table-auto w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-gray-800 uppercase">
                    <tr>
                        <th class="px-6 py-3">No.</th>
                        <th class="px-6 py-3">Volunteer Name</th>
                        <th class="px-6 py-3">Phone Number</th>
                        <th class="px-6 py-3">Member Status</th>
                        <th class="px-6 py-3">Allocate Merit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($participants as $index => $participant)
                        <tr class="border-b">
                            <td class="px-6 py-3">{{ $index + 1 }}</td>
                            <td class="px-6 py-3">
                                @if ($participant->member)
                                    {{ $participant->member->name }}
                                @elseif ($participant->nonmember)
                                    {{ $participant->nonmember->name }}
                                @else
                                    N/A
                                @endif 
                            </td>
                            <td class="px-6 py-3">
                                @if ($participant->member)
                                    {{ $participant->member->phone_number }}
                                @elseif ($participant->nonmember)
                                    {{ $participant->nonmember->phone_number }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="px-6 py-3">
                                @if ($participant->member)
                                    {{ $participant->member->member_status }}
                                @else
                                    Public
                                @endif
                            </td>
                            <td class="px-6 py-3 text-center">
                                <input type="checkbox" name="allocate-merit" value="{{ $participant->member_id ?? $participant->nonmember_id }}" class="allocate-checkbox">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table> 
        </div>

    {{-- <!-- Pagination -->
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
    </div> --}}
    <!-- Pagination -->
<div class="flex justify-between items-center mt-6">
    <p class="text-sm text-gray-600" id="pagination-info"></p>
    <div class="flex items-center space-x-1">
        <button id="prev-page" class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300" disabled>
            Previous
        </button>
        <div id="page-numbers" class="flex items-center space-x-1"></div>
        <button id="next-page" class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300">
            Next
        </button>
    </div>
</div>

    <!-- JavaScript to Handle PDF Generation -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('admin/adminEvent.js') }}"></script>
    <script>
        function generatePDF() {
            // Replace with actual logic for PDF generation
            alert('Generating PDF...');
        }
    </script>
    <!-- JavaScript to Handle Checkbox Selection -->
    <script>
        function submitSelected() {
            // Get all checkboxes
            const checkboxes = document.querySelectorAll('.allocate-checkbox');
            const selected = [];

            // Collect selected checkbox values
            checkboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    selected.push(checkbox.value);
                }
            });

            if (selected.length > 0) {
                alert(`Selected IDs: ${selected.join(', ')}`);
                // Replace with logic to allocate merit based on selected IDs
            } else {
                alert('No volunteers selected.');
            }
        }
    </script>

   
   
</x-admin-layout>
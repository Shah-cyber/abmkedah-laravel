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
                <td class="px-4 py-2">{{ $event->event_name }}</td>
            </tr>
            <tr class="border-b">
                <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">Fee</th>
                <td class="px-4 py-2">RM{{ number_format($event->event_price, 2) }}</td>
            </tr>
            <tr class="border-b">
                <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">Total Collection</th>
                <td class="px-4 py-2">RM{{ number_format($totalCollection, 2) }}</td>
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
            @foreach($participants as $index => $participant)
                <tr class="border-b">
                    <td class="px-6 py-3">{{ $index + 1 }}</td>
                    <td class="px-6 py-3">
                        @if($participant->member)
                            {{ $participant->member->name }}
                        @elseif($participant->nonmember)
                            {{ $participant->nonmember->name }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="px-6 py-3">
                        @if($event->event_price > 0)
                            {{ $participant->payment_date }}
                        @else
                            {{ $participant->join_date }}
                        @endif
                    </td>
                    <td class="px-6 py-3">
                        @if($event->event_price > 0)
                            {{ $participant->payment_time }}
                        @else
                            {{ $participant->join_time }}
                        @endif
                    </td>
                    <td class="px-6 py-3">
                        @if($participant->member)
                            {{ $participant->member->member_status }}
                        @else
                            Public
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


      <!-- Pagination -->
      <div class="flex justify-between items-center mt-6">
        <p class="text-sm text-gray-600">
            Showing {{ $participants->firstItem() }} to {{ $participants->lastItem() }} of {{ $participants->total() }} entries
        </p>
        <div class="flex items-center space-x-1">
            @if($participants->onFirstPage())
                <button class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md cursor-not-allowed">
                    Previous
                </button>
            @else
                <a href="{{ $participants->previousPageUrl() }}" class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300">
                    Previous
                </a>
            @endif

            @foreach ($participants->getUrlRange(1, $participants->lastPage()) as $page => $url)
                @if ($page == $participants->currentPage())
                    <button class="px-3 py-1 text-sm text-white bg-blue-500 rounded-md">
                        {{ $page }}
                    </button>
                @else
                    <a href="{{ $url }}" class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300">
                        {{ $page }}
                    </a>
                @endif
            @endforeach

            @if($participants->hasMorePages())
                <a href="{{ $participants->nextPageUrl() }}" class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300">
                    Next
                </a>
            @else
                <button class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md cursor-not-allowed">
                    Next
                </button>
            @endif
        </div>
    </div>

    <!-- JavaScript to Handle PDF Generation -->
    <script>
        function generatePDF() {
            // Replace with actual logic for PDF generation
            alert('Generating PDF...');
        }
    </script>
</x-admin-layout>
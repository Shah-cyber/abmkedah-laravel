<x-admin-layout>
   <!-- Header Section -->
   <div class="mb-4 flex items-center">
    <!-- Icon Back Button -->
    <a href="{{ route('admin.fee-collection.list') }}" class="text-gray-600 hover:text-gray-800">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
    </a>
    <!-- Title -->
    <h1 class="ml-4 text-2xl font-bold text-gray-800">Payment Report</h1>
</div>
<!-- Horizontal Line -->
<hr class="border-gray-300 my-2">

<!-- Member Information Table -->
<div class="mb-6 mt-4 overflow-x-auto bg-gray-50 rounded-md shadow-md">
    <table class="table-auto w-full text-sm text-left text-gray-600">
        <tbody>
            <tr class="border-b">
                <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">Payment Name</th>
                <td class="px-4 py-2">{{ $payment->payment_allocation_name }}</td>
            </tr>
            <tr class="border-b">
                <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">Amount</th>
                <td class="px-4 py-2">RM{{ number_format($payment->amount, 2) }}</td>
            </tr>
            <tr class="border-b">
                <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">Total Collection</th>
                <td class="px-4 py-2">RM{{ number_format($totalCollection, 2) }}</td>
            </tr>

            <!-- Member Payment Summary Header -->
            <tr class="border-b">
                <th rowspan="2" class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">Members</th>
                <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100 text-center">Complete Payment</th>
                <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100 text-center">Incomplete Payment</th>
                <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100 text-center">Total</th>
            </tr>

            <!-- Member Payment Summary Data -->
            <tr class="border-b">
                <td class="px-4 py-2 text-center">RM{{ number_format($completePayments, 2) }}</td>
                <td class="px-4 py-2 text-center">RM{{ number_format($incompletePayments, 2) }}</td>
                <td class="px-4 py-2 text-center">RM{{ number_format($totalCollection, 2) }}</td>
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

    <!-- Generate Report -->
    <div class="flex items-center justify-end mb-4">
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
                @foreach($paymentReceipts as $index => $receipt)
                    <tr class="border-b">
                        <td class="px-6 py-3">{{ $index + 1 }}</td>
                        <td class="px-6 py-3">
                            @if($receipt->member)
                                {{ $receipt->member->name }}
                            @elseif($receipt->nonmember)
                                {{ $receipt->nonmember->name }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td class="px-6 py-3">{{ date('d/m/Y', strtotime($receipt->payment_date)) }}</td>
                        <td class="px-6 py-3">{{ $receipt->payment_time }}</td>
                        <td class="px-6 py-3">
                            @if($receipt->payment_status == 'completed')
                                <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                    <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                                    Complete
                                </span>
                            @else
                                <span class="inline-flex items-center bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                    <span class="w-2 h-2 me-1 bg-yellow-500 rounded-full"></span>
                                    Pending
                                </span>
                            @endif
                        </td>
                    </tr>
                @endforeach
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
    <!-- JavaScript to Handle PDF Generation -->
    <script>
        function generatePDF() {
            // Replace with actual logic for PDF generation
            alert('Generating PDF...');
        }
    </script>
</x-admin-layout>
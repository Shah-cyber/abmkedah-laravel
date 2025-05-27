<x-admin-layout>
    <!-- Header Section with improved styling -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex items-center">
            <a href="{{ route('admin.fee-collection.list') }}" 
               class="p-2 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div class="ml-4">
                <h1 class="text-2xl font-bold text-gray-800">Payment Report</h1>
                <p class="text-sm text-gray-600 mt-1">Detailed payment information and statistics</p>
            </div>
        </div>
    </div>

    <!-- Summary Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <!-- Total Collection Card -->
        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center">
                <div class="p-3 bg-yellow-100 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Collection</p>
                    <p class="text-2xl font-bold text-gray-900">RM{{ number_format($totalCollection, 2) }}</p>
                </div>
            </div>
        </div>

        <!-- Complete Payments Card -->
        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Complete Payments</p>
                    <p class="text-2xl font-bold text-gray-900">RM{{ number_format($completePayments, 2) }}</p>
                </div>
            </div>
        </div>

        <!-- Incomplete Payments Card -->
        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Incomplete Payments</p>
                    <p class="text-2xl font-bold text-gray-900">RM{{ number_format($incompletePayments, 2) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Details Card -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6 border border-gray-200">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Payment Details</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="space-y-3">
                <div class="flex justify-between py-2 border-b border-gray-100">
                    <span class="text-gray-600">Payment Name</span>
                    <span class="font-medium text-gray-900">{{ $payment->payment_allocation_name }}</span>
                </div>
                <div class="flex justify-between py-2 border-b border-gray-100">
                    <span class="text-gray-600">Amount</span>
                    <span class="font-medium text-gray-900">RM{{ number_format($payment->amount, 2) }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Actions Section -->
    <div class="flex flex-col md:flex-row gap-4 mb-6">
        <!-- Search Box -->
        <div class="flex-1">
            <div class="relative">
                <input type="text"
                    id="searchInput"
                    class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200"
                    placeholder="Search by name, date, or status...">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="absolute left-3 top-3.5 h-5 w-5 text-gray-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>

        <!-- Generate Report Button -->
        <div class="flex-none">
            <button type="button"
                onclick="generatePDF()"
                class="w-full md:w-auto px-6 py-3 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg transition-colors duration-200 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                </svg>
                Generate Report
            </button>
        </div>
    </div>

    <!-- Payments Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
        <div class="overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-4 text-sm font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-4 text-sm font-medium text-gray-500 uppercase tracking-wider">Volunteer Name</th>
                        <th class="px-6 py-4 text-sm font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-4 text-sm font-medium text-gray-500 uppercase tracking-wider">Time</th>
                        <th class="px-6 py-4 text-sm font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($paymentReceipts as $index => $receipt)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                @if($receipt->member)
                                    {{ $receipt->member->name }}
                                @elseif($receipt->nonmember)
                                    {{ $receipt->nonmember->name }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ date('d/m/Y', strtotime($receipt->payment_date)) }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $receipt->payment_time }}</td>
                            <td class="px-6 py-4 text-sm">
                                @if($receipt->payment_status == 'completed')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <svg class="mr-1.5 h-2 w-2 text-green-400" fill="currentColor" viewBox="0 0 8 8">
                                            <circle cx="4" cy="4" r="3" />
                                        </svg>
                                        Complete
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        <svg class="mr-1.5 h-2 w-2 text-yellow-400" fill="currentColor" viewBox="0 0 8 8">
                                            <circle cx="4" cy="4" r="3" />
                                        </svg>
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
        <div class="bg-white px-6 py-4 border-t border-gray-200">
            <div class="flex justify-between items-center">
                <p class="text-sm text-gray-600">
                    Showing {{ $paymentReceipts->firstItem() }} to {{ $paymentReceipts->lastItem() }} of {{ $paymentReceipts->total() }} entries
                </p>
                <div class="flex items-center space-x-1">
                    @if($paymentReceipts->onFirstPage())
                        <button class="px-3 py-1 text-sm text-gray-500 bg-gray-100 rounded-md cursor-not-allowed">
                            Previous
                        </button>
                    @else
                        <a href="{{ $paymentReceipts->previousPageUrl() }}" 
                           class="px-3 py-1 text-sm text-gray-600 bg-gray-100 rounded-md hover:bg-gray-200 transition-colors duration-200">
                            Previous
                        </a>
                    @endif

                    @foreach ($paymentReceipts->getUrlRange(1, $paymentReceipts->lastPage()) as $page => $url)
                        @if ($page == $paymentReceipts->currentPage())
                            <button class="px-3 py-1 text-sm text-white bg-yellow-500 rounded-md">
                                {{ $page }}
                            </button>
                        @else
                            <a href="{{ $url }}" 
                               class="px-3 py-1 text-sm text-gray-600 bg-gray-100 rounded-md hover:bg-gray-200 transition-colors duration-200">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    @if($paymentReceipts->hasMorePages())
                        <a href="{{ $paymentReceipts->nextPageUrl() }}" 
                           class="px-3 py-1 text-sm text-gray-600 bg-gray-100 rounded-md hover:bg-gray-200 transition-colors duration-200">
                            Next
                        </a>
                    @else
                        <button class="px-3 py-1 text-sm text-gray-500 bg-gray-100 rounded-md cursor-not-allowed">
                            Next
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const rows = document.querySelectorAll('tbody tr');

            searchInput.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();

                rows.forEach(row => {
                    const name = row.querySelector('td:nth-child(2)')?.textContent.toLowerCase() || '';
                    const date = row.querySelector('td:nth-child(3)')?.textContent.toLowerCase() || '';
                    const status = row.querySelector('td:nth-child(5)')?.textContent.toLowerCase() || '';

                    if (name.includes(searchTerm) || date.includes(searchTerm) || status.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });

        function generatePDF() {
            // Add your PDF generation logic here
            Swal.fire({
                title: 'Generating Report',
                text: 'Your report is being generated...',
                icon: 'info',
                timer: 2000,
                showConfirmButton: false
            });
        }
    </script>
</x-admin-layout>
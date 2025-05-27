<x-admin-layout>
    <!-- Header Section with improved styling -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex justify-between items-center">
            <div>
        <h1 class="text-2xl font-bold text-gray-800">Fee Collection List</h1>
                <p class="text-gray-600 mt-1">Manage and track all fee collections</p>
            </div>
            <a href="{{ route('admin.fee-collection.add') }}" 
               class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg transition-colors duration-200 font-medium shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Add New Payment
            </a>
        </div>
    </div>

    <!-- Search and Stats Section -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <!-- Search Box -->
        <div class="md:col-span-3">
            <div class="relative">
                <input type="text" 
                       id="searchInput"
                       class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200" 
                       placeholder="Search by payment name or amount...">
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="absolute left-3 top-3.5 h-5 w-5 text-gray-400" 
                fill="none"
                viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
        <!-- Stats Card -->
        <div class="bg-white rounded-lg shadow-sm p-4 flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600">Total Collections</p>
                <p class="text-2xl font-bold text-gray-900">{{ $payments->total() }}</p>
            </div>
            <div class="p-3 bg-yellow-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div> 
    </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-4 text-sm font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-4 text-sm font-medium text-gray-500 uppercase tracking-wider">Payment Name</th>
                        <th class="px-6 py-4 text-sm font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-4 text-sm font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($payments as $index => $payment)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $payment->payment_allocation_name }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">RM{{ number_format($payment->amount, 2) }}</td>
                        <td class="px-6 py-4 text-sm">
                            <div class="flex space-x-3">
                        <a href="{{ route('admin.fee-collection.report', $payment->payment_allocation_id) }}" 
                                   class="inline-flex items-center px-3 py-1.5 bg-green-500 hover:bg-green-600 text-white rounded-md transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                             Report
                         </a>
                                <a href="{{ route('admin.fee-collection.edit', $payment->payment_allocation_id) }}" 
                                   class="inline-flex items-center px-3 py-1.5 bg-gray-500 hover:bg-gray-600 text-white rounded-md transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Update
                                </a>
                                <button onclick="deletePayment({{ $payment->payment_allocation_id }})" 
                                        class="inline-flex items-center px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white rounded-md transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Delete
                                </button>
                            </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

        <!-- Pagination Section -->
        <div class="bg-white px-6 py-4 border-t border-gray-200">
            <div class="flex justify-between items-center">
        <p class="text-sm text-gray-600">
            Showing {{ $payments->firstItem() }} to {{ $payments->lastItem() }} of {{ $payments->total() }} entries
        </p>
        <div class="flex items-center space-x-1">
            @if($payments->onFirstPage())
                        <button class="px-3 py-1 text-sm text-gray-500 bg-gray-100 rounded-md cursor-not-allowed">
                    Previous
                </button>
            @else
                        <a href="{{ $payments->previousPageUrl() }}" 
                           class="px-3 py-1 text-sm text-gray-600 bg-gray-100 rounded-md hover:bg-gray-200 transition-colors duration-200">
                    Previous
                </a>
            @endif

            @foreach ($payments->getUrlRange(1, $payments->lastPage()) as $page => $url)
                @if ($page == $payments->currentPage())
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

            @if($payments->hasMorePages())
                        <a href="{{ $payments->nextPageUrl() }}" 
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script src="{{ asset('admin/adminFeeCollection.js') }}"></script> 
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const rows = document.querySelectorAll('tbody tr');

            searchInput.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();

                rows.forEach(row => {
                    const paymentName = row.querySelector('td:nth-child(2)')?.textContent.toLowerCase() || '';
                    const amount = row.querySelector('td:nth-child(3)')?.textContent.toLowerCase() || '';

                    if (paymentName.includes(searchTerm) || amount.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
</x-admin-layout>
<x-member-layout>
    <style>
        .swal-btn {
            @apply bg-blue-600 text-white rounded-lg px-6 py-2.5 font-medium transition-all duration-200 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200;
}

.swal-btn-cancel {
            @apply bg-red-600 text-white rounded-lg px-6 py-2.5 font-medium transition-all duration-200 hover:bg-red-700 focus:ring-4 focus:ring-red-200;
        }

.swal2-actions {
            @apply flex justify-between gap-4;
}

        .search-input:focus + .search-icon {
            @apply text-blue-500;
        }

        .pagination-btn {
            @apply px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200;
        }

        .pagination-btn.active {
            @apply bg-blue-600 text-white hover:bg-blue-700;
        }

        .pagination-btn.inactive {
            @apply bg-gray-100 text-gray-600 hover:bg-gray-200;
        }

        .pagination-btn.disabled {
            @apply opacity-50 cursor-not-allowed pointer-events-none;
        }
    </style>

    <div class="p-6 space-y-6">
        <!-- Header Section with Stats -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Fee Management</h1>
                    <p class="text-gray-500 mt-1">Track and manage your payment records</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="bg-blue-50 text-blue-600 px-4 py-2 rounded-lg flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        <span class="font-medium">Total Payments: {{ $payments->total() }}</span>
                    </div>
                    <div class="bg-yellow-50 text-yellow-600 px-4 py-2 rounded-lg flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="font-medium">Pending: {{ $incompletePayments }}</span>
                    </div>
                </div>
            </div>
    </div>

        <!-- Search and Filter Section -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex flex-col md:flex-row md:items-center gap-4">
                <!-- Search Input -->
                <div class="relative flex-1">
            <input
                type="text"
                        id="searchInput"
                        class="search-input w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                        placeholder="Search by payment name or date..." />
                    <svg class="search-icon absolute left-4 top-3.5 h-5 w-5 text-gray-400 transition-colors duration-200"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
    </div>
    </div>

        <!-- Payment Records Table -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                            <th scope="col" class="px-6 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">Payment Details</th>
                            <th scope="col" class="px-6 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                            <th scope="col" class="px-6 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th scope="col" class="px-6 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="paymentTable">
                @forelse($payments as $index => $payment)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $payment['payment_name'] }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm font-semibold text-gray-900">
                                        RM {{ number_format($payment['total_fee'], 2) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        {{ $payment['payment_date'] ? date('d M Y', strtotime($payment['payment_date'])) : '-' }}
                                    </div>
                        </td>
                                <td class="px-6 py-4">
                                    @php
                                        $statusConfig = [
                                            'pending' => [
                                                'class' => 'bg-yellow-100 text-yellow-800',
                                                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />'
                                            ],
                                            'approve' => [
                                                'class' => 'bg-green-100 text-green-800',
                                                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />'
                                            ],
                                            'completed' => [
                                                'class' => 'bg-blue-100 text-blue-800',
                                                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />'
                                            ],
                                            'reject' => [
                                                'class' => 'bg-red-100 text-red-800',
                                                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />'
                                            ]
                                        ];
                            $status = strtolower($payment['status']);
                                        $config = $statusConfig[$status] ?? [
                                            'class' => 'bg-gray-100 text-gray-800',
                                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />'
                            ];
                        @endphp
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $config['class'] }}">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            {!! $config['icon'] !!}
                                        </svg>
                                {{ ucfirst($payment['status']) }}
                            </span>
                        </td>
                                <td class="px-6 py-4">
                            @if($status === 'pending')
                                @if(isset($payment['payment_allocation_id']))
                                    <form action="{{ route('member.payMembershipFee') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="payment_allocation_id" value="{{ $payment['payment_allocation_id'] }}">
                                        <input type="hidden" name="payment_name" value="{{ $payment['payment_name'] }}">
                                        <input type="hidden" name="total_fee" value="{{ $payment['total_fee'] }}">
                                                <button type="submit" 
                                                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                                    </svg>
                                                    Pay Now
                                                </button>
                                    </form>
                                @elseif(isset($payment['event_id']))
                                            <form method="POST">
                                        @csrf
                                        <input type="hidden" name="event_id" value="{{ $payment['event_id'] }}">
                                        <input type="hidden" name="payment_name" value="{{ $payment['payment_name'] }}">
                                        <input type="hidden" name="total_fee" value="{{ $payment['total_fee'] }}">
                                                <button type="submit" 
                                                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                                    </svg>
                                                    Pay Now
                                                </button>
                                    </form>
                                @else
                                            <span class="text-gray-400">No action available</span>
                                @endif
                            @else
                                        <span class="text-gray-400">No action needed</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                                <td colspan="6" class="px-6 py-10 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        <p class="text-gray-500 text-lg font-medium">No payments found</p>
                                        <p class="text-gray-400 text-sm mt-1">Any pending payments will appear here</p>
                                    </div>
                                </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
            </div>
    </div>

    <!-- Pagination -->
        @if($payments->hasPages())
            <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
        <p class="text-sm text-gray-600">
                        Showing <span class="font-medium">{{ $payments->firstItem() }}</span> to 
                        <span class="font-medium">{{ $payments->lastItem() }}</span> of 
                        <span class="font-medium">{{ $payments->total() }}</span> payments
        </p>
                    <div class="flex items-center gap-2">
                        <button onclick="if(!{{ $payments->onFirstPage() }}) window.location='{{ $payments->previousPageUrl() }}'"
                            class="pagination-btn {{ $payments->onFirstPage() ? 'disabled' : 'inactive' }}">
                Previous
            </button>
            @foreach(range(1, $payments->lastPage()) as $page)
                            <button onclick="window.location='{{ $payments->url($page) }}'"
                                class="pagination-btn {{ $page == $payments->currentPage() ? 'active' : 'inactive' }}">
                    {{ $page }}
                </button>
            @endforeach
                        <button onclick="if({{ $payments->hasMorePages() }}) window.location='{{ $payments->nextPageUrl() }}'"
                            class="pagination-btn {{ !$payments->hasMorePages() ? 'disabled' : 'inactive' }}">
                Next
            </button>
        </div>
    </div>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Search functionality
            const searchInput = document.getElementById('searchInput');
            if (searchInput) {
                searchInput.addEventListener('input', (e) => {
                    const searchTerm = e.target.value.toLowerCase();
                    const rows = document.querySelectorAll('#paymentTable tr');
                    
                    rows.forEach(row => {
                        const paymentName = row.querySelector('td:nth-child(2)')?.textContent.toLowerCase() || '';
                        const paymentDate = row.querySelector('td:nth-child(4)')?.textContent.toLowerCase() || '';
                        const matches = paymentName.includes(searchTerm) || paymentDate.includes(searchTerm);
                        row.style.display = matches ? '' : 'none';
                    });
                });
            }

            // Handle success messages
            @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
                    confirmButtonText: 'Continue',
            customClass: {
                confirmButton: 'swal-btn'
                    }
        });
    @endif

            // Handle error messages
    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
                    confirmButtonText: 'Try Again',
            customClass: {
                confirmButton: 'swal-btn'
                    }
                });
            @endif
        });
    </script>
</x-member-layout>

<x-member-layout>
    <!-- Header Section -->
    <div class="mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Fee Payment List</h1>
        <hr class="border-gray-300 my-2">
    </div>

    <!-- Search Section -->
    <div class="mb-6">
        <div class="relative w-full">
            <input
                type="text"
                class="w-full p-2 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Search payment"
                id="searchInput">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="absolute left-3 top-3 h-5 w-5 text-gray-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 4a4 4 0 100 8 4 4 0 000-8zM21 21l-5.197-5.197"></path>
            </svg>
        </div>
    </div>

    <div class="flex justify-end mb-6">
        <p class="text-gray-600">
            Incomplete Payment:
            <span class="font-medium text-gray-900">{{ $incompletePayments }}</span>
        </p>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="bg-gray-50 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Payment Name</th>
                    <th class="px-4 py-3">Amount</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
            </thead>
            <tbody id="paymentTable">
                @forelse($payments as $index => $payment)
                    <tr class="border-b">
                        <td class="px-4 py-4">{{ $loop->iteration }}</td>
                        <td class="px-4 py-4">{{ $payment['payment_name'] }}</td>
                        <td class="px-4 py-4">RM {{ number_format($payment['total_fee'], 2) }}</td>
                        <td class="px-4 py-4">
                            {{ $payment['payment_date'] ? date('d/m/Y', strtotime($payment['payment_date'])) : '-' }}
                        </td>
                        <td class="px-4 py-2">
                            @php
                                $status = strtolower($payment['status']);
                                $statusClasses = [
                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                    'approve' => 'bg-green-100 text-green-800',
                                    'completed' => 'bg-blue-100 text-blue-800',
                                    'reject' => 'bg-red-100 text-red-800',
                                ];
                                $dotColors = [
                                    'pending' => 'bg-yellow-500',
                                    'approve' => 'bg-green-500',
                                    'completed' => 'bg-blue-500',
                                    'reject' => 'bg-red-500',
                                ];
                            @endphp
                            <span class="inline-flex items-center {{ $statusClasses[$status] ?? 'bg-gray-100 text-gray-800' }} text-xs font-medium px-2.5 py-0.5 rounded-full">
                                <span class="w-2 h-2 me-1 {{ $dotColors[$status] ?? 'bg-gray-500' }} rounded-full"></span>
                                {{ ucfirst($payment['status']) }}
                            </span>
                        </td>
                        <td class="px-4 py-4">
                            @if($payment['status'] === 'Pending' && isset($payment['payment_allocation_id']))
                            <form action="{{ route('member.payMembershipFee') }}" method="POST">
                                @csrf
                                <input type="hidden" name="payment_allocation_id" value="{{ $payment['payment_allocation_id'] }}">
                                <input type="hidden" name="payment_name" value="{{ $payment['payment_name'] }}">
                                <input type="hidden" name="total_fee" value="{{ $payment['total_fee'] }}">
                                <button type="submit" class="text-blue-600 hover:text-blue-800 font-medium">Pay Now</button>
                            </form>
                            @elseif($payment['status'] === 'Pending' && isset($payment['event_id']))
                                <form  method="POST">
                                    @csrf
                                    <input type="hidden" name="event_id" value="{{ $payment['event_id'] }}">
                                    <button type="submit" class="text-blue-600 hover:text-blue-800 font-medium">Pay Now</button>
                                </form>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500">No payments available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-between items-center mt-6">
        <p class="text-sm text-gray-600">
            Showing {{ $payments->firstItem() }} to {{ $payments->lastItem() }} of {{ $payments->total() }} entries
        </p>
        <div class="flex items-center space-x-1">
            <button
                class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300 {{ $payments->onFirstPage() ? 'opacity-50 cursor-not-allowed' : '' }}"
                {{ $payments->onFirstPage() ? 'disabled' : '' }}
                onclick="if (!{{ $payments->onFirstPage() }}) window.location='{{ $payments->previousPageUrl() }}'">
                Previous
            </button>
            @foreach(range(1, $payments->lastPage()) as $page)
                <button
                    class="px-3 py-1 text-sm {{ $page == $payments->currentPage() ? 'text-white bg-blue-500' : 'text-gray-500 bg-gray-200 hover:bg-gray-300' }} rounded-md"
                    onclick="window.location='{{ $payments->url($page) }}'">
                    {{ $page }}
                </button>
            @endforeach
            <button
                class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300 {{ $payments->hasMorePages() ? '' : 'opacity-50 cursor-not-allowed' }}"
                {{ $payments->hasMorePages() ? '' : 'disabled' }}
                onclick="if ({{ $payments->hasMorePages() }}) window.location='{{ $payments->nextPageUrl() }}'">
                Next
            </button>
        </div>
    </div>
</x-member-layout>

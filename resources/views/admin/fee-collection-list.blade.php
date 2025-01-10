<x-admin-layout>
    <!-- Header Section -->
    <div class="mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Fee Collection List</h1>
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
        <!-- Add New Payment Button -->
        <a href="{{ route('admin.fee-collection.add') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg font-medium shadow">
            Add New Payment
        </a>
        <!-- Total Members -->
        <p class="text-gray-600">Total Fee Collection:
            <span class="font-medium text-gray-900">{{ $payments->total() }}</span>
        </p>
    </div>



    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="bg-gray-50 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3 w-3/5">Payment Name</th>
                    <th class="px-4 py-3 w-1/5">Amount</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr class="border-b">
                    <td class="px-4 py-4">{{ $payment->payment_allocation_id }}</td>
                    <td class="px-4 py-4">{{ $payment->payment_allocation_name }}</td>
                    <td class="px-4 py-4">RM{{ number_format($payment->amount, 2) }}</td>
                    <td class="px-4 py-4 flex space-x-2">
                        <a href="{{ route('admin.fee-collection.report', $payment->payment_allocation_id) }}" 
                            class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md">
                             Report
                         </a>
                        <a href="{{ route('admin.fee-collection.edit', $payment->payment_allocation_id) }}" class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded-md">Update</a>
                        <button onclick="deletePayment({{ $payment->payment_allocation_id }})" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- <a href="{{ route('admin.fee-collection.report') }}" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md">Report</a> --}}
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script src="{{ asset('admin/adminFeeCollection.js') }}"></script> 
</x-admin-layout>
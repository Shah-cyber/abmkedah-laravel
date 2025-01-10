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
        <h1 class="ml-4 text-2xl font-bold text-gray-800">Update Payment</h1>
    </div>
    <!-- Horizontal Line -->
    <hr class="border-gray-300 my-2">

    <!-- Form -->
    <div class="mt-4 px-6 py-4 bg-white shadow-lg rounded-lg">
        <form id="feeCollectionUpdateForm" data-payment-id="{{ $payment->payment_allocation_id }}" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Payment Name -->
                <div class="md:col-span-2">
                    <label for="payment-name" class="block text-sm font-medium text-gray-700">Payment Name</label>
                    <input
                        type="text"
                        id="payment-name"
                        name="payment_allocation_name"
                        value="{{ $payment->payment_allocation_name }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required />
                </div>

                <!-- Amount with Prefix -->
                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                    <div class="mt-1 flex rounded-lg shadow-sm">
                        <span class="inline-flex items-center px-3 rounded-l-lg border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                            RM
                        </span>
                        <input
                            type="number"
                            id="amount"
                            name="amount"
                            step="0.01"
                            value="{{ $payment->amount }}"
                            class="flex-1 block w-full px-3 py-2 border border-gray-300 rounded-r-lg focus:ring-indigo-500 focus:border-indigo-500"
                            required />
                    </div>
                </div>

                <!-- Allocation Date -->
                <div>
                    <label for="allocation-date" class="block text-sm font-medium text-gray-700">Allocation Date</label>
                    <input
                        type="date"
                        id="allocation-date"
                        name="allocation_date"
                        value="{{ $payment->allocation_date }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required />
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-right">
                <button
                    type="submit"
                    class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Update Payment
                </button>
            </div>
        </form>
    </div>

    <!-- Include SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Include your custom JS -->
    <script src="{{ asset('admin/adminFeeCollection.js') }}"></script>
</x-admin-layout>
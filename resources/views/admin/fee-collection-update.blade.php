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
                <h1 class="text-2xl font-bold text-gray-800">Update Payment</h1>
                <p class="text-sm text-gray-600 mt-1">Modify existing payment details</p>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6">
            <form id="feeCollectionUpdateForm" data-payment-id="{{ $payment->payment_allocation_id }}" class="space-y-6">
                @csrf
                <!-- Payment Details Section -->
                <div class="space-y-6">
                    <!-- Payment Name -->
                    <div class="space-y-2">
                        <label for="payment-name" class="text-sm font-medium text-gray-700">
                            Payment Name
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                            id="payment-name"
                            name="payment_allocation_name"
                            value="{{ $payment->payment_allocation_name }}"
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200"
                            required />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Amount -->
                        <div class="space-y-2">
                            <label for="amount" class="text-sm font-medium text-gray-700">
                                Amount
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="relative rounded-lg shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">RM</span>
                                </div>
                                <input type="number"
                                    id="amount"
                                    name="amount"
                                    step="0.01"
                                    value="{{ $payment->amount }}"
                                    class="w-full pl-12 pr-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200"
                                    required />
                            </div>
                        </div>

                        <!-- Allocation Date -->
                        <div class="space-y-2">
                            <label for="allocation-date" class="text-sm font-medium text-gray-700">
                                Allocation Date
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="date"
                                id="allocation-date"
                                name="allocation_date"
                                value="{{ $payment->allocation_date }}"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200"
                                required />
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-200">
                    <a href="{{ route('admin.fee-collection.list') }}" 
                       class="px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors duration-200">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg transition-colors duration-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Update Payment
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admin/adminFeeCollection.js') }}"></script>
</x-admin-layout>
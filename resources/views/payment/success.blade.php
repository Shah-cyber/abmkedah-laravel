<x-non-member-layout>
    <div class="p-6 max-w-[60rem] mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Payment Successful</h1>
        <hr class="border-gray-300 my-2">

        <div class="bg-white shadow-md rounded-lg p-6">
            <!-- Success Icon -->
            <div class="flex justify-center mb-6">
                <div class="rounded-full bg-green-100 p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>

            <!-- Success Message -->
            <h2 class="text-xl font-semibold text-gray-800 text-center mb-4">
                {{ session('success') ?? 'You have successfully registered for the event!' }}
            </h2>
        </div>

        <div class="mt-6 flex gap-4">
            <a href="{{ route('non-member.home') }}" class="text-blue-500 hover:underline">Back to Home</a>
            {{-- @if(isset($eventId))
                <a href="{{ route('payment.invoice', ['id' => $eventId]) }}" 
                   class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600">
                    View Invoice
                </a>
            @endif --}}
        </div>
    </div>
</x-non-member-layout> 
<x-admin-layout>
    <!-- Header Section -->
    <div class="mb-4 flex items-center">
        <!-- Icon Back Button -->
        <a href="/admin/member-verification" class="text-gray-600 hover:text-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <!-- Title -->
        <h1 class="ml-4 text-2xl font-bold text-gray-800">Member Verification</h1>
    </div>
    <!-- Horizontal Line -->
    <hr class="border-gray-300 my-2">

    <!-- Form -->
    <div class="mt-4 px-6 py-4 bg-white shadow-lg rounded-lg">
        <form action="#" method="POST" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input
                        type="text"
                        id="username"
                        name="username" 
                        value="{{ $application->login->username ?? 'N/A' }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                        readonly />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ $application->login->email ?? 'N/A' }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                        readonly />
                </div>

                <!-- Applicant Status -->
                @if ($application->applicant_status === 'approve' || $application->applicant_status === 'reject')
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Applicant Status</label>
                        <input
                            type="text"
                            id="status" 
                            name="status"
                            value="{{ ucfirst($application->applicant_status) }}"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                            readonly />
                    </div>
                @endif

                <!-- Proof of Participation -->
                <div>
                    <label for="proof-file" class="block text-sm font-medium text-gray-700">Proof of Participation</label>
                    <div class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm">
                        @if ($application->prove_letter)
                            <a href="{{ Storage::url($application->prove_letter) }}" 
                               target="_blank" 
                               class="text-blue-500 underline">View Proof</a>
                        @else
                            <p class="text-gray-500">No proof available.</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end space-x-2">
                @if ($application->applicant_status === 'pending')
                    <!-- Reject Button -->
                    <button 
                        type="button"
                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md"
                        onclick="rejectMember({{ $application->application_id }})">
                        Reject
                    </button>

                    <!-- Approve Button -->
                    <button 
                        type="button"
                        class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md"
                        onclick="approveMember({{ $application->application_id }})">
                        Approve
                    </button>
                @endif
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
<script src="{{ asset('admin/adminMemberVerification.js') }}"></script> <!-- Link to your SweetAlert JS file -->
</x-admin-layout>


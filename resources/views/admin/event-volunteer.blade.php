<x-admin-layout>
    <!-- Header Section with Breadcrumb -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="/admin/dashboard" 
                   class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <div class="ml-4">
                    <h1 class="text-2xl font-bold text-gray-800">Event Volunteers</h1>
                    <p class="text-sm text-gray-600 mt-1">Manage and view all event volunteers</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <!-- MFLS Alumni Card -->
        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">MFLS Alumni</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $participants->filter(function($participant) { 
                        return $participant->member && strtolower($participant->member->member_status) === 'mfls alumni'; 
                    })->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Associate Members Card -->
        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Associate Members</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $participants->filter(function($participant) { 
                        $status = strtolower($participant->member->member_status ?? '');
                        return $participant->member && ($status === 'associate-member' || $status === 'associate member'); 
                    })->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Total Volunteers Card -->
        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Volunteers</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $totalParticipants }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Actions Section -->
    <div class="flex flex-col md:flex-row gap-4 mb-6">
        <!-- Search Box -->
        <div class="flex-1">
            <div class="relative">
                <input id="search-input" type="text" 
                       class="w-full px-4 py-2 pl-10 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200" 
                       placeholder="Search volunteers by name, email, or event...">
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" 
                     fill="none" 
                     viewBox="0 0 24 24" 
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>

        <!-- Export Button -->
        <button onclick="exportVolunteers()" 
                class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
            </svg>
            Export List
        </button>
    </div>

    <!-- Volunteers Table -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Event Name</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($participants as $participant)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ ($participants->currentPage() - 1) * $participants->perPage() + $loop->iteration }}</td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $participant->member->name ?? 'N/A' }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-600">{{ $participant->member->login->email ?? 'N/A' }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $participant->event->event_name ?? 'N/A' }}</div>
                            </td>
                            <td class="px-6 py-4">
                                @if($participant->member && $participant->member->member_status)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                        {{ $participant->member->member_status === 'active' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ ucfirst($participant->member->member_status) }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        N/A
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
                    Showing {{ $participants->firstItem() }} to {{ $participants->lastItem() }} of {{ $participants->total() }} entries
                </p>
                <div class="flex items-center space-x-1">
                    <button onclick="window.location.href='{{ $participants->previousPageUrl() }}'"
                            class="px-3 py-1 text-sm {{ !$participants->onFirstPage() ? 'text-gray-500 bg-gray-200 hover:bg-gray-300' : 'text-gray-400 bg-gray-100 cursor-not-allowed' }} rounded-md"
                            {{ $participants->onFirstPage() ? 'disabled' : '' }}>
                        Previous
                    </button>

                    @for ($i = 1; $i <= $participants->lastPage(); $i++)
                        <button onclick="window.location.href='{{ $participants->url($i) }}'"
                                class="px-3 py-1 text-sm rounded-md {{ $participants->currentPage() == $i ? 'text-white bg-yellow-500 hover:bg-yellow-600' : 'text-gray-500 bg-gray-200 hover:bg-gray-300' }}">
                            {{ $i }}
                        </button>
                    @endfor

                    <button onclick="window.location.href='{{ $participants->nextPageUrl() }}'"
                            class="px-3 py-1 text-sm {{ $participants->hasMorePages() ? 'text-gray-500 bg-gray-200 hover:bg-gray-300' : 'text-gray-400 bg-gray-100 cursor-not-allowed' }} rounded-md"
                            {{ !$participants->hasMorePages() ? 'disabled' : '' }}>
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Search functionality
        document.getElementById('search-input').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });

        // Export functionality
        function exportVolunteers() {
            Swal.fire({
                title: 'Exporting List',
                text: 'Please wait while we generate your export...',
                icon: 'info',
                showConfirmButton: false,
                allowOutsideClick: false
            });

            // Simulate export process (replace with actual export logic)
            setTimeout(() => {
                Swal.fire({
                    title: 'Success!',
                    text: 'Volunteer list has been exported successfully.',
                    icon: 'success',
                    confirmButtonColor: '#EAB308'
                });
            }, 2000);
        }
    </script>
</x-admin-layout>
<x-admin-layout>
    <!-- Header Section -->
    <div class="mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Member Verification</h1>
        <!-- Horizontal Line -->
        <hr class="border-gray-300 my-2">
    </div>

    <!-- Search and Stats Section -->
    <div class="mb-6 grid grid-cols-1 lg:grid-cols-3 gap-4">
        <!-- Search Input -->
        <div class="lg:col-span-2">
            <div class="relative">
            <input
                type="text"
                    id="searchInput"
                    class="w-full p-3 pl-12 bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                    placeholder="Search member by name, email or status">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                    class="absolute left-4 top-3.5 h-5 w-5 text-gray-400"
                fill="none"
                viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>
        <!-- Stats Cards -->
        <div class="flex gap-4">
            <div class="flex-1 bg-white rounded-lg shadow-sm p-4 border border-gray-200">
                <div class="flex items-center">
                    <div class="p-2 bg-blue-50 rounded-lg">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Total Applications</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $applications->total() }}</p>
                    </div>
                </div>
            </div>
            <div class="flex-1 bg-white rounded-lg shadow-sm p-4 border border-gray-200">
                <div class="flex items-center">
                    <div class="p-2 bg-yellow-50 rounded-lg">
                        <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Pending</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $applications->where('applicant_status', 'pending')->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Username</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($applications as $index => $application)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $applications->firstItem() + $index }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8">
                                        @php
                                            $initials = strtoupper(substr($application->login->username ?? 'N/A', 0, 2));
                                            $colors = ['bg-blue-500', 'bg-green-500', 'bg-yellow-500', 'bg-red-500', 'bg-purple-500'];
                                            $colorIndex = abs(crc32($initials)) % count($colors);
                                        @endphp
                                        <div class="{{ $colors[$colorIndex] }} rounded-full h-8 w-8 flex items-center justify-center">
                                            <span class="text-white text-sm font-medium">{{ $initials }}</span>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $application->login->username ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $application->login->email ?? 'N/A' }}</div>
                        </td>
                            <td class="px-6 py-4 whitespace-nowrap">
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
                                        'reject' => [
                                            'class' => 'bg-red-100 text-red-800',
                                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />'
                                        ]
                                    ];
                                    $status = strtolower($application->applicant_status);
                                    $config = $statusConfig[$status] ?? [
                                        'class' => 'bg-gray-100 text-gray-800',
                                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />'
                                    ];
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $config['class'] }}">
                                    <svg class="-ml-0.5 mr-1.5 h-2 w-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        {!! $config['icon'] !!}
                                    </svg>
                                    {{ ucfirst($status) }}
                                </span>
                        </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <a href="{{ route('admin.member.verification.view', $application->application_id) }}" 
                                   class="inline-flex items-center px-3 py-1.5 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                    <p class="text-gray-500 text-lg font-medium">No applications found</p>
                                    <p class="text-gray-400 text-sm mt-1">Applications will appear here once submitted</p>
                                </div>
                        </td>
                    </tr>
                    @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
        @if($applications->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <!-- Entries Info -->
                    <div class="text-sm text-gray-600">
            Showing {{ $applications->firstItem() }} to {{ $applications->lastItem() }} of {{ $applications->total() }} entries
                    </div>

                    <!-- Pagination Controls -->
                    <div class="flex items-center gap-2">
                        <!-- Previous -->
                <a href="{{ $applications->previousPageUrl() }}"
                           class="{{ !$applications->onFirstPage() ? 'bg-white border-gray-300 text-gray-700 hover:bg-gray-50' : 'bg-gray-100 text-gray-400 cursor-not-allowed' }} relative inline-flex items-center px-3 py-2 text-sm font-medium border rounded-md">
                    Previous
                </a>

                        <!-- Page Numbers -->
                        @php
                            $currentPage = $applications->currentPage();
                            $lastPage = $applications->lastPage();
                            $onEachSide = 1;
                            $start = max($currentPage - $onEachSide, 1);
                            $end = min($currentPage + $onEachSide, $lastPage);

                            if ($start > 1) {
                                echo '<a href="'.$applications->url(1).'" class="relative inline-flex items-center px-3 py-2 text-sm font-medium border rounded-md bg-white border-gray-300 text-gray-700 hover:bg-gray-50">1</a>';
                                if ($start > 2) {
                                    echo '<span class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700">...</span>';
                                }
                            }
                        @endphp

                        @for ($i = $start; $i <= $end; $i++)
                            <a href="{{ $applications->url($i) }}"
                               class="{{ $i == $currentPage ? 'z-10 bg-blue-600 text-white' : 'bg-white border-gray-300 text-gray-700 hover:bg-gray-50' }} relative inline-flex items-center px-3 py-2 text-sm font-medium border rounded-md">
                                {{ $i }}
                </a>
                        @endfor

                        @php
                            if ($end < $lastPage) {
                                if ($end < $lastPage - 1) {
                                    echo '<span class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700">...</span>';
                                }
                                echo '<a href="'.$applications->url($lastPage).'" class="relative inline-flex items-center px-3 py-2 text-sm font-medium border rounded-md bg-white border-gray-300 text-gray-700 hover:bg-gray-50">'.$lastPage.'</a>';
                            }
                        @endphp

                        <!-- Next -->
                <a href="{{ $applications->nextPageUrl() }}"
                           class="{{ $applications->hasMorePages() ? 'bg-white border-gray-300 text-gray-700 hover:bg-gray-50' : 'bg-gray-100 text-gray-400 cursor-not-allowed' }} relative inline-flex items-center px-3 py-2 text-sm font-medium border rounded-md">
                    Next
                </a>
                    </div>
                </div>
            </div>
            @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const rows = document.querySelectorAll('tbody tr');

            searchInput.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();

                rows.forEach(row => {
                    const username = row.querySelector('td:nth-child(2)')?.textContent.toLowerCase() || '';
                    const email = row.querySelector('td:nth-child(3)')?.textContent.toLowerCase() || '';
                    const status = row.querySelector('td:nth-child(4)')?.textContent.toLowerCase() || '';

                    if (username.includes(searchTerm) || email.includes(searchTerm) || status.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
</x-admin-layout>

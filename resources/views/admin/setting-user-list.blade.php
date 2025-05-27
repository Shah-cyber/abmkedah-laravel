<x-admin-layout>
    <!-- Header Section with Breadcrumb -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">User Management</h1>
                <p class="text-sm text-gray-600 mt-1">Manage system users and their permissions</p>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <!-- Total Users Card -->
        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Users</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $users->total() }}</p>
                </div>
            </div>
        </div>

        <!-- Active Users Card -->
        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Active Users</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $users->where('acc_status', 'active')->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Inactive Users Card -->
        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-red-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Inactive Users</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $users->where('acc_status', 'deactivate')->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Actions Section -->
    <div class="flex flex-col md:flex-row gap-4 mb-6">
        <!-- Search Box -->
        <div class="flex-1">
            <div class="relative">
                <input type="text" 
                       id="search-users"
                       class="w-full px-4 py-2 pl-10 rounded-lg border border-gray-300 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200" 
                       placeholder="Search users by name, email, or role...">
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" 
                     fill="none" 
                     viewBox="0 0 24 24" 
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>

        <!-- Action Button -->
        <a href="{{ route('admin.setting.users.add') }}" 
           class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            Add Admin
        </a>
    </div>

    <!-- Users Table -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 text-left">
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($users as $index => $user)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 text-sm text-gray-900">
                                {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 flex-shrink-0">
                                        <div class="h-10 w-10 rounded-full bg-yellow-100 flex items-center justify-center">
                                            {!! Avatar::create($user->username)->toSvg() !!}
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $user->username }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $user->email }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $user->user_type === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                                    {{ $user->user_role }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @if($user->acc_status == 'active')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <div class="w-1.5 h-1.5 mr-1.5 rounded-full bg-green-500"></div>
                                        Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        <div class="w-1.5 h-1.5 mr-1.5 rounded-full bg-red-500"></div>
                                        Inactive
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.setting.users.update', ['id' => $user->user_type == 'admin' ? $user->admin_id : $user->member_id]) }}" 
                                   class="inline-flex items-center px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-md transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Edit
                                </a>
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
                    Showing {{ $users->firstItem() ?? 0 }} to {{ $users->lastItem() ?? 0 }} of {{ $users->total() }} entries
                </p>
                <div class="flex items-center space-x-1">
                    {{-- Previous Page Link --}}
                    @if ($users->onFirstPage())
                        <button class="px-2 py-1 text-xs text-gray-400 bg-gray-100 rounded cursor-not-allowed" disabled>
                            Previous
                        </button>
                    @else
                        <a href="{{ $users->previousPageUrl() }}" 
                           class="px-2 py-1 text-xs text-gray-700 bg-gray-100 hover:bg-gray-200 rounded transition-colors duration-200">
                            Previous
                        </a>
                    @endif

                    {{-- Page Number Links --}}
                    @php
                        $total = $users->lastPage();
                        $current = $users->currentPage();
                        $side = 2; // how many pages to show on each side of current
                        $window = $side * 2;
                        $pages = [];

                        if ($total <= $window + 4) {
                            // Show all pages
                            for ($i = 1; $i <= $total; $i++) {
                                $pages[] = $i;
                            }
                        } else {
                            // Always show first, last, current, and $side pages around current
                            $pages[] = 1;
                            if ($current > $side + 2) {
                                $pages[] = '...';
                            }
                            $start = max(2, $current - $side);
                            $end = min($total - 1, $current + $side);
                            for ($i = $start; $i <= $end; $i++) {
                                $pages[] = $i;
                            }
                            if ($current < $total - $side - 1) {
                                $pages[] = '...';
                            }
                            $pages[] = $total;
                        }
                    @endphp

                    @foreach ($pages as $page)
                        @if ($page === '...')
                            <span class="px-2 py-1 text-xs text-gray-500">...</span>
                        @elseif ($page == $current)
                            <span class="px-2 py-1 text-xs bg-yellow-400 text-white rounded">{{ $page }}</span>
                        @else
                            <a href="{{ $users->url($page) }}" 
                               class="px-2 py-1 text-xs text-gray-700 bg-gray-100 hover:bg-gray-200 rounded transition-colors duration-200">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($users->hasMorePages())
                        <a href="{{ $users->nextPageUrl() }}" 
                           class="px-2 py-1 text-xs text-gray-700 bg-gray-100 hover:bg-gray-200 rounded transition-colors duration-200">
                            Next
                        </a>
                    @else
                        <button class="px-2 py-1 text-xs text-gray-400 bg-gray-100 rounded cursor-not-allowed" disabled>
                            Next
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-users');
            const tableRows = document.querySelectorAll('tbody tr');

            searchInput.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();

                tableRows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            });
        });
    </script>
</x-admin-layout>
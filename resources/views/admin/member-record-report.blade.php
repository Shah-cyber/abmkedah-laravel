<x-admin-layout>
    <!-- Header Section -->
    <div class="mb-4 flex items-center">
        <!-- Icon Back Button -->
        <a href="{{ route('admin.member.record.index') }}" class="text-gray-600 hover:text-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <!-- Title -->
        <h1 class="ml-4 text-2xl font-bold text-gray-800">Member Achievement</h1>
    </div>
    <!-- Horizontal Line -->
    <hr class="border-gray-300 my-2">

     <!-- Member Information Table -->
     <div class="mb-4 mt-4 overflow-x-auto bg-gray-50 rounded-md shadow-md">
        <table class="table-auto w-full text-sm text-left text-gray-600">
            <tbody>
                <tr class="border-b">
                    <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">Full Name</th>
                    <td class="px-4 py-2">{{ $member->name }}</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">IC Number</th>
                    <td class="px-4 py-2">{{ $member->ic_number }}</td>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 text-gray-800 font-semibold bg-gray-100">Member Status</th>
                    <td class="px-4 py-2">{{ $member->member_status }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Select Session & Merit -->
    <div class="mb-4">
        <div class="flex justify-between items-center gap-4">
            <!-- Select Session -->
            <div class="flex-1">
                <label class="block text-sm font-semibold text-gray-600 mb-1">Select Session</label>
                <select id="session-select" class="w-full border border-gray-300 text-gray-600 rounded-md shadow-sm p-2 focus:ring focus:ring-yellow-300">
                    <option value="">Select Session</option>
                    <option value="2025">2025</option>
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                </select>
            </div>
            <!-- Total Merit --> 
            <div class="flex-1">
                <label class="block text-sm font-semibold text-gray-600 mb-1">Total Merit</label>
                <div id="total-merit" 
                     class="bg-gray-100 p-2 rounded-md shadow-sm text-gray-800">
                    0.00
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('session-select').addEventListener('change', function() {
            const session = this.value;
            if(session) {
                fetch(`/admin/member-record/merit/{{ $member->member_id }}?session=${session}`)
                    .then(response => response.json())
                    .then(data => {
                        if(data.success) {
                            document.getElementById('total-merit').textContent = data.total_merit;
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        });
    </script>
    <!-- Generate Achievement Button -->
    <div class="flex items-center justify-end mb-6">
        <button
            type="button"
            onclick="generatePDF()"
            class="w-fit bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md shadow-sm">
            Generate Achievement
        </button>
    </div>

    
    <!-- Achievements Table -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="table-auto w-full text-sm text-left text-gray-600">
            <thead class="bg-gray-100 text-gray-800 uppercase">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Event Name</th>
                    <th class="px-6 py-3">Merit</th>
                    <th class="px-6 py-3">Certificate</th>
                </tr>
            </thead>
            <tbody>
                @forelse($achievements as $index => $achievement)
                    <tr class="border-b">
                        <td class="px-6 py-3">{{ $loop->iteration }}</td>
                        <td class="px-6 py-3">{{ $achievement->event_name }}</td>
                        <td class="px-6 py-3">{{ $achievement->merit_point ?? '0.00' }}</td>
                        <td class="px-6 py-3 text-blue-500 cursor-pointer hover:underline">
                            <a href="#" >View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-3 text-center">No achievements found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

     

    
    <script>
        document.getElementById('session-select').addEventListener('change', function() {
            const session = this.value;
            const totalMeritDiv = document.getElementById('total-merit');
            
            if (!session) {
                totalMeritDiv.textContent = '0.00';
                return;
            }

            // Show loading state
            totalMeritDiv.textContent = 'Loading...';

            fetch(`{{ route('admin.member.record.merit', $member->member_id) }}?session=${session}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        totalMeritDiv.textContent = data.total_merit;
                    } else {
                        totalMeritDiv.textContent = '0.00';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    totalMeritDiv.textContent = '0.00';
                });
        });
    </script>

    
    
    <!-- Pagination -->
    <div class="flex justify-between items-center mt-6">
        <p class="text-sm text-gray-600">
            Showing {{ $achievements->firstItem() }} to {{ $achievements->lastItem() }} of {{ $achievements->total() }} entries
        </p>
        <div class="flex items-center space-x-1">
            <button onclick="changePage({{ $achievements->currentPage() - 1 }})"
                {{ $achievements->onFirstPage() ? 'disabled' : '' }}
                class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">
                Previous
            </button>

            @for ($i = 1; $i <= $achievements->lastPage(); $i++)
                <button onclick="changePage({{ $i }})"
                    class="px-3 py-1 text-sm {{ $achievements->currentPage() == $i ? 'text-white bg-blue-500 hover:bg-blue-600' : 'text-gray-500 bg-gray-200 hover:bg-gray-300' }} rounded-md">
                    {{ $i }}
                </button>
            @endfor

            <button onclick="changePage({{ $achievements->currentPage() + 1 }})"
                {{ $achievements->hasMorePages() ? '' : 'disabled' }}
                class="px-3 py-1 text-sm text-gray-500 bg-gray-200 rounded-md hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">
                Next
            </button>
        </div>
    </div>

    <script>
        function changePage(page) {
            const url = new URL(window.location.href);
            url.searchParams.set('page', page);
            window.location.href = url.toString();
        }
    </script>

    <!-- JavaScript to Handle PDF Generation -->
    <script>
        function generatePDF() {
            // Replace with actual logic for PDF generation
            alert('Generating PDF...');
        }
    </script>
</x-admin-layout>
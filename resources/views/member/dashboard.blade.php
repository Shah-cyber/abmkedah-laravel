<x-member-layout>
    <div class="p-6">
        <!-- Dashboard Header -->
        <div class="text-center md:text-left mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Member Dashboard</h1>
            <p class="text-gray-600">Welcome, {{ $memberDetails->name }}!</p>
        </div>

         <!-- Statistics Cards -->
         <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <!-- Profile Overview Card -->
            <div class="bg-white rounded-lg shadow-md p-6 flex items-center">
                <div class="p-3 bg-blue-100 text-blue-600 rounded-full">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 12c2.761 0 5-2.239 5-5S14.761 2 12 2 7 4.239 7 7s2.239 5 5 5Zm0 2c-4.418 0-8 3.582-8 8a1 1 0 1 0 2 0c0-3.314 2.686-6 6-6s6 2.686 6 6a1 1 0 1 0 2 0c0-4.418-3.582-8-8-8Z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-gray-700">Profile Overview</h2>
                    <div class="text-3xl font-bold text-gray-900">{{ $memberDetails->name }}</div>
                    <div class="text-sm text-gray-500">Membership Status: <span class="font-bold">{{ $memberDetails->member_status }}</span></div>
                </div>
            </div>

            <!-- Total Events Joined Card -->
            <div class="bg-white rounded-lg shadow-md p-6 flex items-center">
                <div class="p-3 bg-green-100 text-green-600 rounded-full">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 2a1 1 0 0 1 2 0v2h4V2a1 1 0 1 1 2 0v2h3a1 1 0 0 1 1 1v17a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3V2ZM6 6v15h12V6H6Zm6 10a1 1 0 0 1-1-1v-4a1 1 0 1 1 2 0v3h2a1 1 0 1 1 0 2h-3Z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-gray-700">Total Events Joined</h2>
                    <div class="text-3xl font-bold text-gray-900">{{ $joinedEvents->count() }}</div>
                    <div class="text-sm text-gray-500">Events Participated</div>
                </div>
            </div>

            <!-- Total Payments Made Card -->
            <div class="bg-white rounded-lg shadow-md p-6 flex items-center">
                <div class="p-3 bg-yellow-100 text-yellow-600 rounded-full">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5Zm16 0H5v3h14V5ZM5 10v9h14v-9H5Zm7 5a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-gray-700">Total Payments Made</h2>
                    <div class="text-3xl font-bold text-gray-900">{{ $totalPayments }}</div>
                    <div class="text-sm text-gray-500">Payments Completed</div>
                </div>
            </div>

            <!-- Upcoming Events Card -->
            <div class="bg-white rounded-lg shadow-md p-6 flex items-center">
                <div class="p-3 bg-red-100 text-red-600 rounded-full">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 2a1 1 0 0 1 2 0v2h4V2a1 1 0 1 1 2 0v2h3a1 1 0 0 1 1 1v17a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3V2ZM6 6v15h12V6H6Zm2 4a1 1 0 1 1 0-2h8a1 1 0 1 1 0 2H8Z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-gray-700">Upcoming Events</h2>
                    <div class="text-3xl font-bold text-gray-900">{{ $upcomingEvents->count() }}</div>
                    <div class="text-sm text-gray-500">Events Coming Soon</div>
                </div>
            </div>
        </div>

        {{-- <!-- Merit Points & Allocations -->
        <div class="mt-6">
            <h2 class="text-xl font-semibold">Merit Points & Allocations</h2>
            <div class="bg-white rounded-lg shadow-md p-4">
                <p><strong>Total Merit Points:</strong> {{ $totalMeritsAwarded }}</p>
                <h3 class="font-semibold mt-4">Allocations Breakdown</h3>
                <ul class="list-disc pl-5">
                    @foreach($topMembers as $member)
                        <li>{{ $member->name }}: {{ $member->total_merit }} points</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Payments & Receipts -->
        <div class="mt-6">
            <h2 class="text-xl font-semibold">Payments & Receipts</h2>
            <div class="bg-white rounded-lg shadow-md p-4">
                <h3 class="font-semibold">Payment History</h3>
                <ul class="list-disc pl-5">
                    @foreach($paymentHistory as $payment)
                        <li>Payment ID: {{ $payment->id }} - Amount: {{ $payment->amount }} - Date: {{ $payment->created_at }}</li>
                    @endforeach
                </ul>
            </div>
        </div> --}}

        <!-- Charts Section -->
        <div class="mt-6 flex justify-between gap-4 w-full">
            <!-- Total Participation Line Chart -->
            <div class="w-1/2 bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-700">Total Event Participation</h2>
                <canvas id="totalParticipationChart"></canvas>
            </div>

            <!-- Merit Points Bar Chart -->
            <div class="w-1/2 bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-700">Merit Points Earned</h2>
                <canvas id="meritPointsChart"></canvas>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Total Participation Line Chart
                const totalParticipationCtx = document.getElementById('totalParticipationChart').getContext('2d');
                const totalParticipationData = {
                    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'], // Predefined weeks in a month
                    datasets: [{
                        label: 'Total Participation',
                        data: {!! json_encode(array_values(array_replace([0, 0, 0, 0], $totalParticipationData->pluck('count', 'week')->toArray()))) !!},
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        fill: false
                    }]
                };

                new Chart(totalParticipationCtx, {
                    type: 'line',
                    data: totalParticipationData,
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1, // Ensure y-axis increments by whole numbers
                                    precision: 0 // Remove decimal places
                                },
                                title: {
                                    display: true,
                                    text: 'Number of Events'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Week in Month'
                                }
                            }
                        }
                    }
                });

                // Merit Points Bar Chart
                const meritPointsCtx = document.getElementById('meritPointsChart').getContext('2d');
                const meritPointsData = {
                    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'], // Predefined weeks in a month
                    datasets: [{
                        label: 'Merit Points Earned',
                        data: {!! json_encode(array_values(array_replace([0, 0, 0, 0], $meritPointsData->pluck('total_merit', 'week')->toArray()))) !!},
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                };

                new Chart(meritPointsCtx, {
                    type: 'bar',
                    data: meritPointsData,
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1, // Ensure y-axis increments by whole numbers
                                    precision: 0 // Remove decimal places
                                },
                                title: {
                                    display: true,
                                    text: 'Total Merit Points'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Week in Month'
                                }
                            }
                        }
                    }
                });
            });
        </script>
          
</x-member-layout>
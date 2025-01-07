<x-admin-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Header Section -->
    <div class="mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
        <span class="text-sm text-gray-400">Welcome to ABM Kedah Admin Panel</span>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <!-- Members Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Members</h2>
                <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <div class="text-3xl font-bold text-gray-900 mb-2" id="totalMembers">{{ $totalMembers }}</div>
            <div class="text-sm text-gray-500">{{ $activeMembers }} Active Members</div>
        </div>

        <!-- Events Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Events</h2>
                <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <div class="text-3xl font-bold text-gray-900 mb-2" id="totalEvents">{{ $totalEvents }}</div>
            <div class="text-sm text-gray-500">{{ $upcomingEvents }} Upcoming Events</div>
        </div>

        <!-- Merit Points Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Total Merit Points</h2>
                <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                </svg>
            </div>
            <div class="text-3xl font-bold text-gray-900 mb-2" id="totalMerits">{{ number_format($totalMeritsAwarded, 2) }}</div>
            <div class="text-sm text-gray-500">Points Awarded</div>
        </div>

        <!-- Applications Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Pending Applications</h2>
                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <div class="text-3xl font-bold text-gray-900 mb-2" id="pendingApplications">{{ $pendingApplications }}</div>
            <div class="text-sm text-gray-500">Awaiting Review</div>
        </div>
    </div>

    <script>
        function animateValue(id, start, end, duration) {
            const obj = document.getElementById(id);
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                const value = progress * (end - start) + start;
                const firstDigit = Math.floor(value);
                const secondDigit = Math.floor((value - firstDigit) * 10);
                obj.innerHTML = `${firstDigit}.${secondDigit}`;
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }

        document.addEventListener('DOMContentLoaded', function() {
            animateValue('totalMembers', 0, {{ $totalMembers }}, 1500);
            animateValue('totalEvents', 0, {{ $totalEvents }}, 1500);
            animateValue('totalMerits', 0, {{ number_format($totalMeritsAwarded, 2) }}, 1000);
            animateValue('pendingApplications', 0, {{ $pendingApplications }}, 1000);
        });
    </script>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Event Statistics Chart -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Event Statistics</h2>
            <canvas id="eventChart"></canvas>
        </div>

        <!-- Merit Distribution Chart -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Merit Distribution</h2>
            <canvas id="meritChart"></canvas>
        </div>

        <!-- Monthly Events Bar Chart -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Monthly Events Overview</h2>
            <canvas id="monthlyEventsChart"></canvas>
        </div>
    </div>

    <script>
        // Event Status Distribution (Pie Chart)
        const eventCtx = document.getElementById('eventChart').getContext('2d');
        new Chart(eventCtx, {
            type: 'pie',
            data: {
                labels: ['Running', 'Draft', 'Ended'],
                datasets: [{
                    data: [
                        {{ $ongoingEvents }},
                        {{ $draftEvents }},
                        {{ $endedEvents }}
                    ],
                    backgroundColor: [
                        'rgba(52, 211, 153, 0.8)',
                        'rgba(251, 191, 36, 0.8)',
                        'rgba(239, 68, 68, 0.8)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    title: {
                        display: true,
                        text: 'Event Status Distribution'
                    }
                }
            }
        });

        // Merit Distribution Chart
        const meritCtx = document.getElementById('meritChart').getContext('2d');
        new Chart(meritCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($topMembers->pluck('name')) !!},
                datasets: [{
                    label: 'Merit Points',
                    data: {!! json_encode($topMembers->pluck('total_merit')) !!},
                                       backgroundColor: 'rgba(59, 130, 246, 0.8)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Merit Points'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Top Members by Merit Points'
                    }
                }
            }
        });

        // Monthly Events Overview Chart
        const monthlyCtx = document.getElementById('monthlyEventsChart').getContext('2d');
        new Chart(monthlyCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode($monthlyLabels) !!},
                datasets: [{
                    label: 'Number of Events',
                    data: {!! json_encode($monthlyEventCounts) !!},
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Events'
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Events per Month'
                    }
                }
            }
        });
    </script>
 

</x-admin-layout>
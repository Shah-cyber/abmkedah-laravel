<x-member-layout>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <div class="p-6 bg-gray-50 min-h-screen">
        <!-- Dashboard Header -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Member Dashboard</h1>
            <p class="text-gray-600 mt-1">Welcome back, <span class="font-semibold">{{ $memberDetails->name }}</span>! Here's your activity overview.</p>
        </div>

         <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Profile Overview Card -->
            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 transition-all duration-300 hover:shadow-lg hover:translate-y-[-2px]">
                <div class="flex items-center">
                    <div class="p-3 bg-gradient-to-br from-blue-100 to-blue-50 text-blue-600 rounded-lg shadow-sm">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 12c2.761 0 5-2.239 5-5S14.761 2 12 2 7 4.239 7 7s2.239 5 5 5Zm0 2c-4.418 0-8 3.582-8 8a1 1 0 1 0 2 0c0-3.314 2.686-6 6-6s6 2.686 6 6a1 1 0 1 0 2 0c0-4.418-3.582-8-8-8Z"></path>
                        </svg>
                    </div>
                    <div class="ml-4 flex-1">
                        <h2 class="text-lg font-bold text-gray-800">Profile Status</h2>
                        <div class="mt-2 flex items-center">
                            @php
                                $statusColor = $memberDetails->member_status === 'active' ? 'text-green-600 bg-green-50 border border-green-200' : 'text-yellow-600 bg-yellow-50 border border-yellow-200';
                            @endphp
                            <span class="text-sm font-medium {{ $statusColor }} px-3 py-1 rounded-full">
                                {{ ucfirst($memberDetails->member_status ?: 'Pending') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Events Joined Card -->
            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 transition-all duration-300 hover:shadow-lg hover:translate-y-[-2px]">
                <div class="flex items-center">
                    <div class="p-3 bg-gradient-to-br from-green-100 to-green-50 text-green-600 rounded-lg shadow-sm">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 2a1 1 0 0 1 2 0v2h4V2a1 1 0 1 1 2 0v2h3a1 1 0 0 1 1 1v17a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3V2Z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-bold text-gray-800">Events Joined</h2>
                        <div class="flex items-baseline mt-2">
                            <span class="text-2xl font-bold text-gray-900">{{ $joinedEvents->count() }}</span>
                            <span class="ml-2 text-sm text-gray-500">Total Events</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Payments Card -->
            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 transition-all duration-300 hover:shadow-lg hover:translate-y-[-2px]">
                <div class="flex items-center">
                    <div class="p-3 bg-gradient-to-br from-yellow-100 to-yellow-50 text-yellow-600 rounded-lg shadow-sm">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.16-1.46-3.27-3.4h1.96c.1 1.05.82 1.87 2.65 1.87 1.96 0 2.4-.98 2.4-1.59 0-.83-.44-1.61-2.67-2.14-2.48-.6-4.18-1.62-4.18-3.67 0-1.72 1.39-2.84 3.11-3.21V4h2.67v1.95c1.86.45 2.79 1.86 2.85 3.39H14.3c-.05-1.11-.64-1.87-2.22-1.87-1.5 0-2.4.68-2.4 1.64 0 .84.65 1.39 2.67 1.91s4.18 1.39 4.18 3.91c-.01 1.83-1.38 2.83-3.12 3.16z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-bold text-gray-800">Total Payments</h2>
                        <div class="flex items-baseline mt-2">
                            <span class="text-2xl font-bold text-gray-900">RM {{ number_format($totalPayments, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Upcoming Events Card -->
            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 transition-all duration-300 hover:shadow-lg hover:translate-y-[-2px]">
                <div class="flex items-center">
                    <div class="p-3 bg-gradient-to-br from-purple-100 to-purple-50 text-purple-600 rounded-lg shadow-sm">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 4h-1V3c0-.55-.45-1-1-1s-1 .45-1 1v1H8V3c0-.55-.45-1-1-1s-1 .45-1 1v1H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2zm-7 5h5v5h-5v-5z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-bold text-gray-800">Upcoming Events</h2>
                        <div class="flex items-baseline mt-2">
                            <span class="text-2xl font-bold text-gray-900">{{ $upcomingEvents->count() }}</span>
                            <span class="ml-2 text-sm text-gray-500">Events</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">
            <!-- Total Participation Line Chart -->
            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 transition-all duration-300 hover:shadow-lg">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-bold text-gray-800">Event Participation</h2>
                    <div class="bg-blue-50 text-blue-600 text-sm font-medium px-3 py-1 rounded-full border border-blue-100 shadow-sm">
                        This Month
                    </div>
                </div>
                <div class="h-[300px] relative">
                    <canvas id="totalParticipationChart"></canvas>
                </div>
            </div>

            <!-- Merit Points Bar Chart -->
            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 transition-all duration-300 hover:shadow-lg">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-bold text-gray-800">Merit Points</h2>
                    <div class="bg-purple-50 text-purple-600 text-sm font-medium px-3 py-1 rounded-full border border-purple-100 shadow-sm">
                        This Month
                    </div>
                </div>
                <div class="h-[300px] relative">
                    <canvas id="meritPointsChart"></canvas>
                </div>
            </div>
        </div>
        
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Total Participation Line Chart
                const totalParticipationCtx = document.getElementById('totalParticipationChart').getContext('2d');
                const totalParticipationData = {
                    labels: {!! json_encode($weekLabels) !!},
                    datasets: [{
                        label: 'Events Participated',
                        data: {!! json_encode(array_values($totalParticipationData)) !!},
                        borderColor: 'rgba(59, 130, 246, 1)', // Blue-500
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: 'rgba(59, 130, 246, 1)',
                        pointBorderWidth: 2,
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        pointHoverBackgroundColor: 'rgba(59, 130, 246, 1)',
                        pointHoverBorderColor: '#ffffff',
                        pointHoverBorderWidth: 2,
                        pointShadowOffsetX: 1,
                        pointShadowOffsetY: 1,
                        pointShadowBlur: 5,
                        pointShadowColor: 'rgba(0, 0, 0, 0.2)'
                    }]
                };

                new Chart(totalParticipationCtx, {
                    type: 'line',
                    data: totalParticipationData,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                backgroundColor: 'rgba(17, 24, 39, 0.9)',
                                titleColor: '#ffffff',
                                bodyColor: '#ffffff',
                                padding: 12,
                                cornerRadius: 8,
                                titleFont: {
                                    size: 14,
                                    weight: 'bold'
                                },
                                bodyFont: {
                                    size: 14
                                },
                                mode: 'index',
                                intersect: false,
                                displayColors: false,
                                callbacks: {
                                    label: function(context) {
                                        return ' ' + context.parsed.y + ' events';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1,
                                    precision: 0,
                                    font: {
                                        size: 12,
                                        weight: '500'
                                    },
                                    color: 'rgba(55, 65, 81, 0.8)'
                                },
                                grid: {
                                    color: 'rgba(226, 232, 240, 0.6)',
                                    drawBorder: false
                                },
                                border: {
                                    display: false
                                }
                            },
                            x: {
                                grid: {
                                    display: false,
                                    drawBorder: false
                                },
                                ticks: {
                                    font: {
                                        size: 12,
                                        weight: '500'
                                    },
                                    color: 'rgba(55, 65, 81, 0.8)'
                                },
                                border: {
                                    display: false
                                }
                            }
                        },
                        elements: {
                            line: {
                                tension: 0.4
                            }
                        }
                    }
                });

                // Merit Points Bar Chart
                const meritPointsCtx = document.getElementById('meritPointsChart').getContext('2d');
                const meritPointsData = {
                    labels: {!! json_encode($weekLabels) !!},
                    datasets: [{
                        label: 'Merit Points',
                        data: {!! json_encode(array_values($meritPointsData)) !!},
                        backgroundColor: 'rgba(147, 51, 234, 0.8)', // Purple-600
                        borderColor: 'rgba(147, 51, 234, 1)',
                        borderWidth: 2,
                        borderRadius: 8,
                        maxBarThickness: 45,
                        hoverBackgroundColor: 'rgba(147, 51, 234, 1)'
                    }]
                };

                new Chart(meritPointsCtx, {
                    type: 'bar',
                    data: meritPointsData,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                backgroundColor: 'rgba(17, 24, 39, 0.9)',
                                titleColor: '#ffffff',
                                bodyColor: '#ffffff',
                                padding: 12,
                                cornerRadius: 8,
                                titleFont: {
                                    size: 14,
                                    weight: 'bold'
                                },
                                bodyFont: {
                                    size: 14
                                },
                                mode: 'index',
                                intersect: false,
                                displayColors: false,
                                callbacks: {
                                    label: function(context) {
                                        return ' ' + context.parsed.y + ' points';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    precision: 0,
                                    font: {
                                        size: 12,
                                        weight: '500'
                                    },
                                    color: 'rgba(55, 65, 81, 0.8)'
                                },
                                grid: {
                                    color: 'rgba(226, 232, 240, 0.6)',
                                    drawBorder: false
                                },
                                border: {
                                    display: false
                                }
                            },
                            x: {
                                grid: {
                                    display: false,
                                    drawBorder: false
                                },
                                ticks: {
                                    font: {
                                        size: 12,
                                        weight: '500'
                                    },
                                    color: 'rgba(55, 65, 81, 0.8)'
                                },
                                border: {
                                    display: false
                                }
                            }
                        },
                        animation: {
                            duration: 1000
                        }
                    }
                });
            });
        </script>
    </div>
</x-member-layout>
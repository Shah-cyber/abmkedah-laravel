<x-admin-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Header Section -->
    <div class="p-4">
        <div class="mb-4">
            <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
            <span class="text-sm text-gray-400">Welcome to ABM Kedah Admin Panel</span>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Members Card -->
            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 transition-all duration-300 hover:shadow-lg hover:translate-y-[-2px]">
                <div class="flex items-center">
                    <div class="p-3 bg-gradient-to-br from-blue-100 to-blue-50 text-blue-600 rounded-lg shadow-sm">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-bold text-gray-800">Members</h2>
                        <div class="text-3xl font-bold text-gray-900 mt-2" id="totalMembers">{{ $totalMembers }}</div>
                        <div class="text-sm text-gray-500 mt-1">{{ $activeMembers }} Active Members</div>
                    </div>
                </div>
            </div>

            <!-- Events Card -->
            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 transition-all duration-300 hover:shadow-lg hover:translate-y-[-2px]">
                <div class="flex items-center">
                    <div class="p-3 bg-gradient-to-br from-yellow-100 to-yellow-50 text-yellow-600 rounded-lg shadow-sm">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-bold text-gray-800">Events</h2>
                        <div class="text-3xl font-bold text-gray-900 mt-2" id="totalEvents">{{ $totalEvents }}</div>
                        <div class="text-sm text-gray-500 mt-1">{{ $upcomingEvents }} Upcoming Events</div>
                    </div>
                </div>
            </div>

            <!-- Revenue Card -->
            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 transition-all duration-300 hover:shadow-lg hover:translate-y-[-2px]">
                <div class="flex items-center">
                    <div class="p-3 bg-gradient-to-br from-green-100 to-green-50 text-green-600 rounded-lg shadow-sm">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-bold text-gray-800">Total Revenue</h2>
                        <div class="text-3xl font-bold text-gray-900 mt-2">RM{{ number_format($totalRevenue, 2) }}</div>
                        <div class="text-sm text-gray-500 mt-1">From Successful Payments</div>
                    </div>
                </div>
            </div>

            <!-- Applications Card -->
            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 transition-all duration-300 hover:shadow-lg hover:translate-y-[-2px]">
                <div class="flex items-center">
                    <div class="p-3 bg-gradient-to-br from-red-100 to-red-50 text-red-600 rounded-lg shadow-sm">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-bold text-gray-800">Pending Applications</h2>
                        <div class="text-3xl font-bold text-gray-900 mt-2" id="pendingApplications">{{ $pendingApplications }}</div>
                        <div class="text-sm text-gray-500 mt-1">Awaiting Review</div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function animateValue(id, start, end, duration) {
                const obj = document.getElementById(id);
                let startTimestamp = null;
                const step = (timestamp) => {
                    if (!startTimestamp) startTimestamp = timestamp;
                    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                    const value = Math.floor(progress * (end - start) + start);
                    obj.innerHTML = value.toLocaleString();
                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    }
                };
                window.requestAnimationFrame(step);
            }

            document.addEventListener('DOMContentLoaded', function() {
                animateValue('totalMembers', 0, {{ $totalMembers }}, 1500);
                animateValue('totalEvents', 0, {{ $totalEvents }}, 1500);
                animateValue('pendingApplications', 0, {{ $pendingApplications }}, 1000);
            });
        </script>

        <!-- Charts Section -->
        <div class="grid grid-cols-4 gap-8">
            <!-- Monthly Revenue Breakdown (spans 2 columns) -->
            <div class="col-span-2 row-span-5 bg-white rounded-lg shadow-md p-6 flex flex-col">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-700">Monthly Revenue Breakdown</h2>
                        <p class="text-sm text-gray-500 mt-1">Revenue analysis for {{ $selectedYear }}</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="bg-gray-100 rounded-lg px-3 py-2">
                            <span class="text-sm font-medium text-gray-600">
                                Total: RM{{ number_format($monthlyRevenue->sum('total'), 2) }}
                            </span>
                        </div>
                        <form method="GET" class="flex items-center">
                            <select name="year" onchange="this.form.submit()" 
                                    class="bg-white border border-gray-200 text-gray-700 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm font-medium">
                                @foreach($availableYears as $year)
                                    <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <!-- Highest Revenue Month -->
                    <div class="bg-blue-50 rounded-lg p-4">
                        <div class="flex items-center">
                            <div class="w-3 h-3 rounded-full bg-blue-500 mr-2"></div>
                            <span class="text-sm font-medium text-gray-700">Highest Revenue</span>
                        </div>
                        <div class="mt-2">
                            @php
                                $highestRevenue = $monthlyRevenue->max('total');
                                $highestMonth = $monthlyRevenue->where('total', $highestRevenue)->first();
                            @endphp
                            <span class="text-xl font-bold text-gray-800">
                                RM{{ number_format($highestRevenue, 2) }}
                            </span>
                            <span class="text-sm text-gray-500 ml-2">
                                ({{ $highestMonth ? $highestMonth->month_name : 'N/A' }})
                            </span>
                        </div>
                    </div>
                    <!-- Average Monthly Revenue -->
                    <div class="bg-purple-50 rounded-lg p-4">
                        <div class="flex items-center">
                            <div class="w-3 h-3 rounded-full bg-purple-500 mr-2"></div>
                            <span class="text-sm font-medium text-gray-700">Monthly Average</span>
                        </div>
                        <div class="mt-2">
                            <span class="text-xl font-bold text-gray-800">
                                RM{{ number_format($monthlyRevenue->average('total'), 2) }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="flex-grow">
                    <canvas id="monthlyRevenueBarChart" style="width: 100%; height: 100%; min-height: 300px;"></canvas>
                </div>

                @if(isset($monthlyRevenue) && count($monthlyRevenue) > 0)
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const ctx = document.getElementById('monthlyRevenueBarChart').getContext('2d');
                            const months = @json($months);
                            const revenueData = Array(12).fill(0);
                            @foreach($monthlyRevenue as $item)
                                revenueData[{{ $item->month_num - 1 }}] = {{ $item->total }};
                            @endforeach

                            // Calculate gradient
                            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
                            gradient.addColorStop(0, 'rgba(59, 130, 246, 0.9)');   // Blue-500
                            gradient.addColorStop(1, 'rgba(147, 197, 253, 0.9)');  // Blue-300

                            new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: months,
                                    datasets: [{
                                        label: 'Revenue (RM)',
                                        data: revenueData,
                                        backgroundColor: gradient,
                                        borderColor: 'rgba(59, 130, 246, 1)',
                                        borderWidth: 2,
                                        borderRadius: 8,
                                        maxBarThickness: 40
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    plugins: {
                                        legend: { display: false },
                                        tooltip: {
                                            backgroundColor: 'rgba(17, 24, 39, 0.9)',
                                            padding: 12,
                                            bodyFont: { size: 14 },
                                            callbacks: {
                                                label: function(context) {
                                                    return 'RM ' + context.raw.toLocaleString(undefined, {
                                                        minimumFractionDigits: 2,
                                                        maximumFractionDigits: 2
                                                    });
                                                }
                                            }
                                        }
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            grid: {
                                                drawBorder: false,
                                                color: 'rgba(226, 232, 240, 0.6)'
                                            },
                                            ticks: {
                                                callback: function(value) {
                                                    return 'RM ' + value.toLocaleString();
                                                },
                                                font: {
                                                    size: 12
                                                }
                                            }
                                        },
                                        x: {
                                            grid: {
                                                display: false
                                            },
                                            ticks: {
                                                font: {
                                                    size: 12
                                                }
                                            }
                                        }
                                    },
                                    animation: {
                                        duration: 2000,
                                        easing: 'easeInOutQuart'
                                    }
                                }
                            });
                        });
                    </script>
                @else
                    <div class="text-center text-gray-400 mt-8">No revenue data available for this year.</div>
                @endif
            </div>
            <!-- Payment Statistics Chart (col 3) -->
            <div class="row-span-5 col-start-3 col-span-2 bg-white rounded-lg shadow-md p-6 flex flex-col">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-700">Payment Statistics</h2>
                        <p class="text-sm text-gray-500 mt-1">Overview of payment status</p>
                    </div>
                    <div class="bg-gray-100 rounded-lg px-3 py-2">
                        <span class="text-sm font-medium text-gray-600">Total: RM{{ number_format($paymentData->completed + $paymentData->pending, 2) }}</span>
                    </div>
                </div>

                <!-- Chart Container with Legend -->
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="w-full md:w-2/3 relative">
                        <canvas id="paymentChart" style="max-height:280px; min-height:280px;"></canvas>
                    </div>
                    <div class="w-full md:w-1/3 mt-4 md:mt-0 md:ml-4">
                        <div class="space-y-4">
                            <!-- Completed Payments -->
                            <div class="p-3 bg-green-50 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 rounded-full bg-green-500 mr-2"></div>
                                    <span class="text-sm font-medium text-gray-700">Completed</span>
                                </div>
                                <div class="mt-2">
                                    <span class="text-xl font-bold text-gray-800">RM{{ number_format($paymentData->completed, 2) }}</span>
                                    <span class="text-sm text-gray-500 ml-2">({{ round(($paymentData->completed / ($paymentData->completed + $paymentData->pending)) * 100) }}%)</span>
                                </div>
                            </div>
                            <!-- Pending Payments -->
                            <div class="p-3 bg-yellow-50 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 rounded-full bg-yellow-400 mr-2"></div>
                                    <span class="text-sm font-medium text-gray-700">Pending</span>
                                </div>
                                <div class="mt-2">
                                    <span class="text-xl font-bold text-gray-800">RM{{ number_format($paymentData->pending, 2) }}</span>
                                    <span class="text-sm text-gray-500 ml-2">({{ round(($paymentData->pending / ($paymentData->completed + $paymentData->pending)) * 100) }}%)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const paymentCtx = document.getElementById('paymentChart').getContext('2d');
                        new Chart(paymentCtx, {
                            type: 'doughnut',
                            data: {
                                labels: ['Completed', 'Pending'],
                                datasets: [{
                                    data: [
                                        {{ $paymentData->completed ?? 0 }},
                                        {{ $paymentData->pending ?? 0 }}
                                    ],
                                    backgroundColor: [
                                        'rgba(34, 197, 94, 0.9)',  // Green for completed
                                        'rgba(234, 179, 8, 0.9)'   // Yellow for pending
                                    ],
                                    borderColor: [
                                        'rgba(34, 197, 94, 1)',
                                        'rgba(234, 179, 8, 1)'
                                    ],
                                    borderWidth: 2,
                                    cutout: '75%',
                                    borderRadius: 8
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        display: false
                                    },
                                    tooltip: {
                                        backgroundColor: 'rgba(17, 24, 39, 0.9)',
                                        padding: 12,
                                        bodyFont: {
                                            size: 14
                                        },
                                        callbacks: {
                                            label: function(context) {
                                                const value = context.raw;
                                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                                const percentage = ((value / total) * 100).toFixed(1);
                                                return `RM${value.toLocaleString()} (${percentage}%)`;
                                            }
                                        }
                                    }
                                },
                                animation: {
                                    animateScale: true,
                                    animateRotate: true
                                }
                            }
                        });
                    });
                </script>
            </div>
            <!--
            <div class="row-span-5 col-start-4 bg-white rounded-lg shadow-md p-6 flex flex-col">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Event Statistics</h2>
                <canvas id="eventChart"></canvas>
            </div>
            -->
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

            // Payment Statistics Chart
            const paymentCtx = document.getElementById('paymentChart').getContext('2d');
            new Chart(paymentCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Completed', 'Pending'],
                    datasets: [{
                        data: [
                            {{ $paymentData->completed ?? 0 }},
                            {{ $paymentData->pending ?? 0 }}
                        ],
                        backgroundColor: [
                            'rgba(52, 211, 153, 0.8)', // Green for completed
                            'rgba(251, 191, 36, 0.8)'  // Yellow for pending
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
                            text: 'Payment Status Distribution'
                        }
                    }
                }
            });

            // Update monthly chart to show revenue
            const monthlyCtx = document.getElementById('monthlyEventsChart').getContext('2d');
            new Chart(monthlyCtx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($monthlyRevenue->pluck('month')) !!},
                    datasets: [{
                        label: 'Monthly Revenue',
                        data: {!! json_encode($monthlyRevenue->pluck('total')) !!},
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
                                text: 'Revenue (RM)'
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Monthly Revenue Overview'
                        }
                    }
                }
            });

            // Monthly Revenue Bar Chart
            const monthlyBarCtx = document.getElementById('monthlyRevenueBarChart').getContext('2d');
            const monthColors = [
                '#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6', 
                '#EC4899', '#14B8A6', '#84CC16', '#F97316', '#06B6D4',
                '#A855F7', '#D946EF'
            ];

            new Chart(monthlyBarCtx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($monthlyRevenue->pluck('month_name')->map(fn($m) => strtoupper(substr($m, 0, 3)))) !!},
                    datasets: [{
                        label: 'Monthly Revenue (RM)',
                        data: {!! json_encode($monthlyRevenue->pluck('total')) !!},
                        backgroundColor: monthColors,
                        borderColor: '#1E3A8A',
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
                                text: 'Revenue (RM)'
                            },
                            grid: {
                                color: '#E5E7EB'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Month'
                            },
                            grid: {
                                display: false
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: `Monthly Revenue for {{ $selectedYear }}`
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return 'RM ' + context.raw.toFixed(2);
                                }
                            }
                        }
                    }
                }
            });
        </script>

    </div>

</x-admin-layout>
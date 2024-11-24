@extends('Gym.index')

@section('content')
    <div class="flex p-2 gap-x-4 h-[100vh] bg-black/5">
        <div class="w-[20vw] h-[95vh] rounded-xl bg-black text-white ">
            @include('Gym.layouts.sidebar')
        </div>
        <div class="w-[80vw] flex flex-col gap-y-2 bg-black/5p-2">
            @include('Gym.layouts.headbar')
                <div class="flex justify-between gap-x-1">
                        @include('Gym.layouts.calendar')
                    @include('Gym.layouts.member.right-sidebar')

                </div>
            </div>
        </div>

        <script>
            const ctx = document.getElementById('activityChart').getContext('2d');

            const data = {
                labels: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'], // Days of the week
                datasets: [{
                    label: 'Activity',
                    data: [30, 50, 60, 40, 50, 30, 70], // Activity percentage
                    borderColor: '#FF9D52', // Line color
                    backgroundColor: 'rgba(255, 157, 82, 0.2)', // Gradient fill
                    fill: true,
                    tension: 0.4, // Curve the line
                    pointBackgroundColor: '#FF9D52', // Points on the line
                    pointBorderWidth: 2,
                    pointHoverRadius: 5
                }]
            };

            const options = {
                responsive: true,
                maintainAspectRatio: false, // Ensures better control over height
                plugins: {
                    legend: {
                        display: false // Hides the legend
                    },
                    tooltip: {
                        enabled: true,
                        callbacks: {
                            label: function(context) {
                                return `${context.raw}% Activity`; // Customize tooltip text
                            }
                        },
                        backgroundColor: '#6C5F8D', // Tooltip background
                        titleFont: {
                            size: 12
                        },
                        bodyFont: {
                            size: 12
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            drawOnChartArea: false // Hides grid lines on the chart area
                        },
                        ticks: {
                            color: '#6C5F8D'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        max: 100, // Maximum activity percentage
                        grid: {
                            color: 'rgba(108, 95, 141, 0.1)' // Light grid color
                        },
                        ticks: {
                            display: false // Hides Y-axis ticks for a cleaner look
                        }
                    }
                }
            };

            new Chart(ctx, {
                type: 'line',
                data: data,
                options: options
            });
        </script>
    @endsection

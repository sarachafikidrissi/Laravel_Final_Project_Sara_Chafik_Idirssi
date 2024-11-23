@extends('Gym.index')

@section('content')
    <div class="flex p-2 gap-x-4 h-[100vh] bg-black/5">
        <div class="w-[20vw] h-[95vh] rounded-xl bg-black text-white ">
            @include('Gym.layouts.sidebar')
        </div>
        <div class="w-[80vw] flex flex-col gap-y-2 bg-black/5p-2">
            @include('Gym.layouts.headbar')
            <div class="flex gap-x-2">
                <div class="flex flex-col gap-y-8">
                    <div class="w-[60vw] h-[30vh] p-4 bg-white rounded-lg shadow mx-auto">
                        <div class="flex justify-between items-center mb-2">
                            <h2 class="text-lg font-bold">Activity</h2>
                            <div class="text-sm text-gray-500 cursor-pointer">Weekly</div>
                        </div>
                        <canvas id="activityChart"></canvas>
                    </div>

                    <div class="flex gap-x-2 h-[50vh] items-center">
                        <div class="w-[30vw] h-[40vh] p-4 bg-white rounded-lg shadow">
                            <div class="flex justify-between items-center mb-2">
                                <h2 class="text-lg font-bold">Popular trainers</h2>
                                <div class="text-sm text-gray-500 cursor-pointer"><a href=""> see more <i
                                            class="bi bi-chevron-right text-[#e37a2a]"></i></a></div>
                            </div>
                            <div class="flex items-center justify-between px-2  h-[85%]">
                                @foreach ($popularTrianers as $trainer)
                                    <div class="w-[12vw] h-[25vh] bg-white shadow rounded-md flex flex-col gap-y-2">
                                        <img src="{{ asset('storage/' . $trainer->image) }}" alt="" class="w-full h-[60%] rounded-md rounded-es-none rounded-ee-none object-cover">
                                        <div class="flex flex-col gap-y-2 items-center">
                                            
                                            <h1 class="text-sm text-gray-900 font-semibold">{{ $trainer->name }}</h1>
                                            <h1 class="text-sm  text-gray-600 ">{{$trainer->name }}</h1>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="w-[30vw] h-[40vh] p-4 bg-white rounded-lg shadow">
                           
                            <div class="flex flex-wrap gap-y-4 justify-between px-2  h-[85%]">

                                    <div class="w-[12vw] h-[15vh] p-2 bg-white shadow rounded-md flex flex-col gap-y-2">
                                        <div class="flex flex-col gap-y-2 ">
                                            <div class=" w-[40px] h-[40px] rounded-md bg-black relative">
                                                <i class="bi bi-heart-pulse-fill text-[#ff9d52] text-3xl absolute left-[50%] translate-x-[-50%] top-[50%] translate-y-[-50%]"></i>
                                            </div>
                                            <h1 class="text-sm text-gray-900 font-semibold">110</h1>
                                            <h1 class="text-sm  text-gray-600 ">Heart Rate</h1>
                                        </div>
                                    </div>
                                    <div class="w-[12vw] h-[15vh] p-2 bg-white shadow rounded-md flex flex-col gap-y-2">
                                        <div class="flex flex-col gap-y-2 ">
                                            <div class=" w-[40px] h-[40px] rounded-md bg-black relative">
                                                <i class="bi bi-fire text-[#ff6952] text-3xl absolute left-[50%] translate-x-[-50%] top-[50%] translate-y-[-50%]"></i>
                                            </div>
                                            <h1 class="text-sm text-gray-900 font-semibold">{{ Auth::user()->calories}}</h1>
                                            <h1 class="text-sm  text-gray-600 ">Calories To burn</h1>
                                        </div>
                                    </div>
                                    <div class="w-[12vw] h-[15vh] p-2 bg-white shadow rounded-md flex flex-col gap-y-2">
                                        <div class="flex flex-col gap-y-2 ">
                                            <div class=" w-[40px] h-[40px] rounded-md bg-black relative">
                                                <i class="bi bi-moon-stars text-[#282db5] text-3xl absolute left-[50%] translate-x-[-50%] top-[50%] translate-y-[-50%]"></i>
                                            </div>
                                            <h1 class="text-sm text-gray-900 font-semibold">8 Hours</h1>
                                            <h1 class="text-sm  text-gray-600 ">Sleeping</h1>
                                        </div>
                                    </div>
                                    <div class="w-[12vw] h-[15vh] p-2 bg-white shadow rounded-md flex flex-col gap-y-2">
                                        <div class="flex flex-col gap-y-2 ">
                                            <div class=" w-[40px] h-[40px] rounded-md bg-black relative">
                                                <i class="bi bi-person-walking text-[#52ffc8] text-3xl absolute left-[50%] translate-x-[-50%] top-[50%] translate-y-[-50%]"></i>
                                            </div>
                                            <h1 class="text-sm text-gray-900 font-semibold">5000 steps</h1>
                                            <h1 class="text-sm  text-gray-600 ">Daily Waliking Goal</h1>
                                        </div>
                                    </div>
                            </div>
                        </div>

                    </div>


                </div>
                @include('Gym.layouts.member.right-sidebar')
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

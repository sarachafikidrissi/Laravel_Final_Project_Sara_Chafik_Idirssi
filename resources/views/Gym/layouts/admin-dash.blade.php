@extends('Gym.index')


@section('content')
@checkRole('admin')
    <div class="flex p-2 gap-x-4 bg-black/5">
        <div class="w-[20vw] h-[95vh] rounded-xl bg-black text-white ">
            @include('Gym.layouts.sidebar')    
        </div>
        <div class="w-[80vw] flex flex-col gap-y-2 bg-black/5p-2">
            @include('Gym.layouts.headbar')
            <div class=" ">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <!-- Users Card -->
                  <div class="bg-white card-shadow  shadow-lg rounded-lg p-6 text-black flex items-center justify-between">
                    <div>
                      <h2 class="text-lg font-semibold text-[#ee7605e3]">Total Users</h2>
                      <p class="text-xl font-bold mt-4">{{ $totalMembers }}</p>
                    </div>
                    <div class="border border-[#ff7b00e3] p-4 w-[15px] h-[15px] rounded-full relative">
                        <i class="bi bi-people absolute translate-y-[-50%] translate-x-[-50%]"></i>
                    </div>
                  </div>
              
                  <!-- Trainers Card -->
                  <div class="bg-white card-shadow text-black  rounded-lg p-6 flex items-center justify-between">
                    <div>
                      <h2 class="text-lg font-semibold text-[#ee7605e3]">Total Trainers</h2>
                      <p class="text-xl font-bold mt-4">{{  $trainersTotal }}</p>
                    </div>
                    <div class="border border-[#ff7b00e3] p-4 w-[15px] h-[15px] rounded-full relative">
                        <i class="bi bi-people absolute translate-y-[-50%] translate-x-[-50%]"></i>
                    </div>
                  </div>
                </div>
              
                <!-- Calendar and Numbers Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                  <!-- Calendar Card -->
                  <div class="bg-white card-shadow rounded-lg p-6 text-black card-shadow col-span-2 flex flex-col justify-between h-[60vh]">

                    @include('Gym.layouts.planing-calendar')
                    
                  </div>
              
                  <!-- Numbers of Users and Trainers -->
                  <div class="flex flex-col space-y-4">
                    <!-- Users Card -->
                    <div class="bg-white card-shadow  rounded-lg p-4 text-black flex justify-between items-center">
                      <p class="text-sm font-medium text-[#ee7605e3]">Total Membership</p>
                      <p class="text-lg font-bold">{{ $totalSubscription }}</p>
                    </div>
                    <!-- Trainers Card -->
                    <div class="bg-white card-shadow rounded-lg p-4 text-black flex justify-between items-center">
                      <p class="text-sm font-medium text-[#ee7605e3] ">Trainers Requests</p>
                      <p class="text-lg  ">{{ $totalRequests == 0 ? 'No Requests' : $totalRequests }}</p>
                    </div>
                  </div>
                </div>
        </div>
        
        </div>
    </div>

  @endCheckRole
@endsection


  
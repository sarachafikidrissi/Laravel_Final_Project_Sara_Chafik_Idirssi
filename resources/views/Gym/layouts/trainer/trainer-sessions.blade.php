@extends('Gym.index')


@section('content')
    <div class="flex p-2 gap-x-4 bg-black/5">
        <div class="w-[20vw] h-[95vh] rounded-xl bg-black text-white ">
            @include('Gym.layouts.sidebar')
        </div>
        <div class="w-[80vw] flex flex-col gap-y-4 bg-black/5p-2">
            @include('Gym.layouts.headbar')
            <div class="flex flex-col">
                <div class="w-full flex ">
                    <button id="openSessionForm"
                        class="text-lg font-semibold text-[#ee7605e3] border px-2 rounded-md border-[#ee7605e3]">
                        Add Session
                        <i class="bi bi-plus-circle text-xl text-[#ee7605e3]"></i>
                    </button>
                    @include('Gym.layouts.modals.add-session')

                </div>
            </div>

            <!-- Calendar and Numbers Cards -->
            {{-- <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                <!-- Calendar Card -->
                <div
                    class="bg-white card-shadow rounded-lg p-6 text-black card-shadow col-span-2 flex flex-col justify-between h-[60vh]">
                    <div>
                        <h2 class="text-lg font-semibold text-[#ee7605e3]">Planning Calendar</h2>
                        <p class="text-xl font-bold mt-4">Today's Sessions</p>
                    </div>

                </div>


            </div> --}}
        </div>

    </div>
    </div>
@endsection

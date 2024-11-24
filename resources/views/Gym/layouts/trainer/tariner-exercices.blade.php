@extends('Gym.index')


@section('content')
    @checkRole('trainer')
    <div class="flex p-2 gap-x-4 bg-black/5   h-[100vh]">
        <div class="w-[20vw] h-[95vh] rounded-xl bg-black text-white ">
            @include('Gym.layouts.sidebar')
        </div>
        <div class="w-[80vw] flex flex-col gap-y-4 bg-black/5p-2">
            @include('Gym.layouts.headbar')
            <div class="bg-white pt-4 rounded-xl h-[83vh]">
                <div class="flex flex-col  ">
                    <div class="w-full flex  ps-14">
                        @if (Auth::user()->trainersRequestStatus == 'pending')
                            <h1 class="text-md text-red-900 mb-4"><i class="bi bi-exclamation-triangle"></i> Can't add
                                sessions
                                for the moment , wait until your request will be approved by admin</h1>
                        @else
                            <button id="openExerciceForm"
                                class="text-lg font-semibold text-[#ee7605e3] border px-2 rounded-md border-[#ee7605e3]">
                                <i class="bi bi-plus-circle text-xl text-[#ee7605e3]"></i>
                                Add Exercice
                            </button>
                            @include('Gym.layouts.modals.add-exercice')
                        @endif
                    </div>
                </div>

                <div class=" w-full h-[78.5vh]  px-2 pt-5 flex justify-center ">
                    <div class="flex flex-wrap gap-x-4   w-[70vw]">
                        @foreach ($exercices as $exercice)
                            <div class="rounded-md overflow-hidden flex flex-col w-[22vw] h-[26vh] ">
                                
                                <a href="#">
                                    <img class="w-full h-[20vh] rounded-md"
                                        src="{{ asset('storage/images/exercices/' . $exercice->image) }}">
                                </a>
                                <div
                                    class="relative -mt-16 w-[80%] h-[12vh] p-2 card-shadow rounded-md bg-black text-white m-10">
                                    
                                    <a href="#"
                                        class="font-semibold text-sm inline-block  mb-2">{{ $exercice->name }}</a>
                                        <!-- Dropdown Menu -->
                                        <div class="relative bottom-8">
                                            <button class="text-white   ps-20 absolute right-0"
                                                onclick="toggleDropdown({{ $exercice->id }})">
                                                <i class="bi bi-three-dots"></i>
                                            </button>
                                            <!-- Dropdown Menu Content -->
                                            <div id="dropdown-{{ $exercice->id }}"
                                                class="hidden z-10 absolute right-0 top-5  w-32 bg-white rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                                                <div class="">
                                                    <button data-task-id="{{ $exercice->id }}" type="button"
                                                        onclick="document.getElementById('editModal-{{ $exercice->id }}').classList.remove('hidden');"
                                                        class="text-gray-600 block px-4 py-1 text-sm">
                                                        Edit
                                                    </button>
                                                    <form method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 block px-4 pb-2 text-sm "
                                                            onclick="return confirm('Are you sure?')">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="w-full flex justify-end">
                                            <form method="post" action="{{ route('append.exercice') }}" >
                                                @csrf
                                                <input type="text" name="exercice_id" value={{ $exercice->id }} class="hidden">
                                            <div class="relative inline-block">
                                                <!-- Dropdown -->
                                                <select
                                                    name="trainer_session_id"
                                                    id="sessionDropdown"
                                                    class=" text-black px-2 py-1 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-[#FF9D52]">
                                                    <option  disabled selected>Select a session</option>
                                                    @foreach ($sessions as $session)
                                                    <option  value={{ $session->id }}>{{ $session->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                                <button
                                                    class="bg-[#FF9D52] text-white px-3 py-1 ml-2 rounded-md hover:bg-[#EE7605] focus:outline-none transition duration-300">
                                                    Append
                                                </button>

                                            </form>
                                        </div>
                                        

                                </div>

                                

                            </div>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>

    </div>
    </div>
    @endCheckRole
    <script>
        function toggleDropdown(id) {
            const dropdown = document.getElementById(`dropdown-${id}`);
            dropdown.classList.toggle("hidden");
        }

        function toggleCreateDropdown() {
            const dropdown = document.getElementById("createDropdown");
            dropdown.classList.toggle("hidden");
        }
    </script>
@endsection

@extends('Gym.index')


@section('content')
    <div class="flex p-2 gap-x-4 bg-black/5  h-[100vh]">
        <div class="w-[20vw] h-[95vh] rounded-xl bg-black text-white ">
            @include('Gym.layouts.sidebar')
        </div>
        <div class="w-[80vw] flex flex-col gap-y-4 bg-black/5p-2">
            @include('Gym.layouts.headbar')
            <div class="bg-white pt-4 rounded-xl h-[83vh]">
                <div class="flex flex-col  ">
                    <div class="w-full flex  ps-14">
                        @checkRole('trainer')
                            @if (Auth::user()->trainersRequestStatus == 'pending')
                                <h1 class="text-md text-red-900 mb-4"><i class="bi bi-exclamation-triangle"></i> Can't add sessions
                                    for the moment , wait until your request will be approved by admin</h1>
                            @else
                                <button id="openSessionForm"
                                    class="text-lg font-semibold text-[#ee7605e3] border px-2 rounded-md border-[#ee7605e3]">
                                    <i class="bi bi-plus-circle text-xl text-[#ee7605e3]"></i>
                                    Add Session
                                </button>
                                @include('Gym.layouts.modals.add-session')
                            @endif
                        @endCheckRole
                    </div>
                </div>
    
                <div class=" w-full h-[78.5vh]  px-2 pt-5 flex justify-center ">
                    <div class="flex flex-wrap gap-x-16  h-full  w-[70vw]">
                        @foreach ($sessions as $session)
                            <div class="rounded-md overflow-hidden flex flex-col w-[20vw] h-[30vh] ">
    
                                <a href="#">
                                    <img class="w-full rounded-md"
                                        src="{{ asset('storage/images/sessions/' . $session->image) }}">
                                </a>
                                <div class="relative -mt-16 w-[80%] h-[12vh] p-2 card-shadow rounded-md bg-black text-white m-10">
                                    <a href="#"
                                        class="font-semibold text-sm inline-block hover:text-[#ee7605e3] transition duration-500 ease-in-out mb-2">{{ $session->name }}</a>
                                    @checkRole('trainer')
                                        <div class="flex justify-between">
                                            <a href="#"
                                                class=" inline-block text-[#ee7605e3] hover:text-[#ee4305e3] transition duration-500 ease-in-out mb-2">see
                                                more</a>
                                              <!-- Dropdown Menu -->
                                       <div class="relative bottom-8 ">
                                        <button class="text-white   ps-20 " onclick="toggleDropdown({{ $session->id }})">
                                           <i class="bi bi-three-dots"></i>
                                        </button>
                                        <!-- Dropdown Menu Content -->
                                        <div id="dropdown-{{ $session->id }}" class="hidden z-10 absolute right-0  w-32 bg-white rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                                            <div class="">
                                                <a href="/session/edit/{{ $session->id }}"
                                                data-task-id="{{ $session->id }}"
                                                type="button"
                                                onclick="document.getElementById('editModal-{{ $session->id }}').classList.remove('hidden');"
                                                class="text-gray-600 block px-4 py-2 text-sm"
                                            >
                                                Edit
                                            </a>
                                                <form  method="POST" class="inline" action="/session/destroy/{{ $session->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 block px-4 pb-2 text-sm " onclick="return confirm('Are you sure?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                         
    
                                        </div>
                                    @endCheckRole
                                </div>    
                            </div>
                        @endforeach
                      
    
    
                    </div>
    
                </div>

            </div>
        </div>

    </div>
    </div>


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

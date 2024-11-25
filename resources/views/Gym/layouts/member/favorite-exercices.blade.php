@extends('Gym.index')


@section('content')
    @checkRole('member')
        <div class="flex p-2 gap-x-4 bg-black/5   h-[100vh]">
            <div class="w-[20vw] h-[95vh] rounded-xl bg-black text-white ">
                @include('Gym.layouts.sidebar')
            </div>
            <div class="w-[80vw] flex flex-col gap-y-4 bg-black/5p-2">
                @include('Gym.layouts.headbar')
                <div class="bg-white pt-4 rounded-xl h-[83vh]">
               

                    <div class=" w-full h-[78.5vh]  px-2 pt-5 flex justify-center ">
                        <div class="flex flex-wrap gap-x-4   w-[70vw]">
                            @foreach ($exercices as $exercice)
                                <div class="rounded-md overflow-hidden relative flex flex-col w-[22vw] h-[30vh] ">

                                    <a href="#">
                                        <img class="w-full h-[23vh] rounded-md"
                                            src="{{ asset('storage/images/exercices/' . $exercice->image) }}">
                                    </a>
                                    <div
                                        class="absolute top-[12vh] w-[80%] h-[10vh] p-2 card-shadow rounded-md bg-black text-white m-10">

                                        <a href="#"
                                            class="font-semibold text-sm inline-block   text-center">{{ $exercice->name }}</a>
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

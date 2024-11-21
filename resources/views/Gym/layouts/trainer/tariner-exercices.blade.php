@extends('Gym.index')


@section('content')
    <div class="flex p-2 gap-x-4 bg-black/5 test  h-[100vh]">
        <div class="w-[20vw] h-[95vh] rounded-xl bg-black text-white ">
            @include('Gym.layouts.sidebar')
        </div>
        <div class="w-[80vw] flex flex-col gap-y-4 bg-black/5p-2">
            @include('Gym.layouts.headbar')
            <div class="flex flex-col  ">
                <div class="w-full flex  ps-14">
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
                </div>
            </div>

            <div class=" w-full h-[78.5vh]  px-2 pt-10 flex justify-center ">
                <div class="flex flex-wrap gap-x-16  h-full  w-[70vw]">
                    @foreach ($sessions as $session)
                        <div class="rounded-md overflow-hidden flex flex-col w-[20vw] h-[30vh] ">

                            <a href="#">
                                <img class="w-full rounded-md"
                                    src="{{ asset('storage/images/sessions/' . $session->image) }}">
                            </a>
                            <div class="relative -mt-16 w-[80%] h-[12vh] p-2 card-shadow rounded-md bg-white m-10">
                                <a href="#"
                                    class="font-semibold text-sm inline-block hover:text-[#ee7605e3] transition duration-500 ease-in-out mb-2">{{ $session->name }}</a>
                                <div class="flex justify-between">
                                    <a href="#"
                                        class=" inline-block text-[#ee7605e3] hover:text-[#ee4305e3] transition duration-500 ease-in-out mb-2">see more</a>
                                    <div>
                                        <a href="#"
                                            class="font-semibold text-xl inline-block text-[#ee0d05e3] hover:text-[#ee4305e3] transition duration-500 ease-in-out mb-2">
                                            <i class="bi bi-trash"></i></a>
                                        <a href="#"
                                            class="font-semibold text-xl inline-block text-[#05eebbe3] hover:text-[#ee4305e3] transition duration-500 ease-in-out mb-2"><i
                                                class="bi bi-pencil-square"></i></a>
                                    </div>

                                </div>

                            </div>

                        </div>
                    @endforeach
                    <div class="rounded-md overflow-hidden flex flex-col w-[20vw] h-[30vh] ">

                        <a href="#">
                            <img class="w-full rounded-md"
                                src="https://images.pexels.com/photos/5120892/pexels-photo-5120892.jpeg?auto=compress&amp;cs=tinysrgb&amp;fit=crop&amp;h=625.0&amp;sharp=10&amp;w=1000"
                                alt="Sunset in the mountains">
                        </a>
                        <div class="relative -mt-16 w-[80%] h-[12vh] p-2 card-shadow rounded-md bg-white m-10">
                            <a href="#"
                                class="font-semibold text-sm inline-block hover:text-[#ee7605e3] transition duration-500 ease-in-out mb-2">The
                                Best Activewear from the Nordstrom Anniversary Sale</a>
                            <div class="flex justify-between">
                                <a href="#"
                                    class=" inline-block text-[#ee7605e3] hover:text-[#ee4305e3] transition duration-500 ease-in-out mb-2">See
                                    more</a>
                                <div>
                                    <a href="#"
                                        class="font-semibold text-xl inline-block text-[#ee0d05e3] hover:text-[#ee4305e3] transition duration-500 ease-in-out mb-2">
                                        <i class="bi bi-trash"></i></a>
                                    <a href="#"
                                        class="font-semibold text-xl inline-block text-[#05eebbe3] hover:text-[#ee4305e3] transition duration-500 ease-in-out mb-2"><i
                                            class="bi bi-pencil-square"></i></a>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="rounded-md overflow-hidden flex flex-col w-[20vw] h-[30vh] ">

                        <a href="#">
                            <img class="w-full rounded-md"
                                src="https://images.pexels.com/photos/5120892/pexels-photo-5120892.jpeg?auto=compress&amp;cs=tinysrgb&amp;fit=crop&amp;h=625.0&amp;sharp=10&amp;w=1000"
                                alt="Sunset in the mountains">
                        </a>
                        <div class="relative -mt-16 w-[80%] h-[12vh] p-2 card-shadow rounded-md bg-white m-10">
                            <a href="#"
                                class="font-semibold text-sm inline-block hover:text-[#ee7605e3] transition duration-500 ease-in-out mb-2">The
                                Best Activewear from the Nordstrom Anniversary Sale</a>
                            <div class="flex justify-between">
                                <a href="#"
                                    class=" inline-block text-[#ee7605e3] hover:text-[#ee4305e3] transition duration-500 ease-in-out mb-2">See
                                    more</a>
                                <div>
                                    <a href="#"
                                        class="font-semibold text-xl inline-block text-[#ee0d05e3] hover:text-[#ee4305e3] transition duration-500 ease-in-out mb-2">
                                        <i class="bi bi-trash"></i></a>
                                    <a href="#"
                                        class="font-semibold text-xl inline-block text-[#05eebbe3] hover:text-[#ee4305e3] transition duration-500 ease-in-out mb-2"><i
                                            class="bi bi-pencil-square"></i></a>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="rounded-md overflow-hidden flex flex-col w-[20vw] h-[30vh] ">

                        <a href="#">
                            <img class="w-full rounded-md"
                                src="https://images.pexels.com/photos/5120892/pexels-photo-5120892.jpeg?auto=compress&amp;cs=tinysrgb&amp;fit=crop&amp;h=625.0&amp;sharp=10&amp;w=1000"
                                alt="Sunset in the mountains">
                        </a>
                        <div class="relative -mt-16 w-[80%] h-[12vh] p-2 card-shadow rounded-md bg-white m-10">
                            <a href="#"
                                class="font-semibold text-sm inline-block hover:text-[#ee7605e3] transition duration-500 ease-in-out mb-2">The
                                Best Activewear from the Nordstrom Anniversary Sale</a>
                            <div class="flex justify-between">
                                <a href="#"
                                    class=" inline-block text-[#ee7605e3] hover:text-[#ee4305e3] transition duration-500 ease-in-out mb-2">See
                                    more</a>
                                <div>
                                    <a href="#"
                                        class="font-semibold text-xl inline-block text-[#ee0d05e3] hover:text-[#ee4305e3] transition duration-500 ease-in-out mb-2">
                                        <i class="bi bi-trash"></i></a>
                                    <a href="#"
                                        class="font-semibold text-xl inline-block text-[#05eebbe3] hover:text-[#ee4305e3] transition duration-500 ease-in-out mb-2"><i
                                            class="bi bi-pencil-square"></i></a>
                                </div>

                            </div>

                        </div>

                    </div>


                </div>

            </div>
        </div>

    </div>
    </div>
@endsection

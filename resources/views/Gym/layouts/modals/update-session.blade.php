@extends('Gym.index')


@section('content')
    <div class="flex p-2 gap-x-4 bg-black/5">
        <div class="w-[20vw] h-[95vh] rounded-xl bg-black text-white ">
            @include('Gym.layouts.sidebar')
        </div>
        <div class="w-[80vw] flex flex-col gap-y-2 bg-black/5p-2">
            @include('Gym.layouts.headbar')

            <div class="bg-white w-full h-full px-4 pt-2 rounded shadow-md mb-4">
                <h2 class="text-2xl font-bold ">Update Session</h2>

                <form enctype="multipart/form-data" action="{{ route('session.update', $session->id) }}" method="post">
                    @csrf
                    @method('PUT') <!-- For update requests -->
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                    <!-- Name -->
                    <div class="mb-2">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $session->name) }}"
                            class="w-full p-2 border rounded-md focus:outline-none focus:border-[#FF9D52]">
                    </div>

                    <!-- Description -->
                    <div class="mb-2">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                        <textarea id="description" name="description"
                            class="w-full p-2 border rounded-md focus:outline-none focus:border-[#FF9D52]">{{ old('description', $session->description) }}</textarea>
                    </div>

                    <!-- Event Start and End -->
                    <div class="flex w-full justify-between">
                        <div class="mb-2  w-[40%]">
                            <label for="start" class="block text-gray-700 text-sm font-bold mb-2">Event Start
                                Day/Time</label>
                            <input type="datetime-local" id="start" name="start"
                                value="{{ old('start', $session->start) }}"
                                class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="mb-2  w-[40%]">
                            <label for="end" class="block text-gray-700 text-sm font-bold mb-2">Event End
                                Day/Time</label>
                            <input type="datetime-local" id="end" name="end"
                                value="{{ old('end', $session->end) }}"
                                class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <!-- Image -->
                        <div class="mt-4 w-[50%]">
                            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Session Cover</label>
                            <div class="flex items-center space-x-6">
                                <div class="shrink-0">
                                    <img id="preview_img" class="w-[200px] h-[100px] object-cover"
                                        src="{{ $session->image ? asset('storage/images/sessions/' . $session->image) : 'https://via.placeholder.com/200x100' }}"
                                        alt="Session Cover" />
                                </div>
                                <label class="block">
                                    <span class="sr-only">Choose session cover</span>
                                    <input type="file" id="image" accept="image/*" name="image"
                                        onchange="loadFile(event)"
                                        class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                                </label>
                            </div>
                        </div>

                        <!-- Spots -->
                        <div class="mb-2 w-[50%]">
                            <label for="spots" class="block text-gray-700 text-sm font-bold mb-2">Spots</label>
                            <input type="number" id="spots" name="spots" min="1"
                                value="{{ old('spots', $session->spots) }}"
                                class="w-full p-2 border rounded-md focus:outline-none focus:border-[#FF9D52]">
                        </div>

                    </div>

                    <!-- Status -->
                    <div class="w-full mt-4 flex justify-between">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                            <div class="mt-2">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="status" value="free"
                                        {{ old('status', $session->status) === 'free' ? 'checked' : '' }}
                                        class="focus:ring-[#FF9D52] focus:ring-offset-2 text-yellow-400">
                                    <span class="ml-2">Free</span>
                                </label>
                            </div>
                            <div class="mt-2">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="status" value="premium"
                                        {{ old('status', $session->status) === 'premium' ? 'checked' : '' }}
                                        class="focus:ring-[#FF9D52] focus:ring-offset-2 text-yellow-400">
                                    <span class="ml-2">Premium</span>
                                </label>
                            </div>
                        </div>

                        <!-- Price -->
                        <div class="mb-2">
                            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">If premium, Enter
                                Price</label>
                            <input type="number" id="price" name="price" min="1"
                                value="{{ old('price', $session->price) }}"
                                class="w-full p-2 border rounded-md focus:outline-none focus:border-[#FF9D52]">
                        </div>
                    </div>



                    <!-- Submit Button -->
                    <button type="submit"
                        class="bg-[#FF9D52] text-white font-bold py-2 px-4 w-full mt-2 rounded hover:bg-[#FF9D52] focus:ring focus:ring-offset-2 focus:ring-[#FF9D52]">
                        Update
                    </button>
                </form>
            </div>





        </div>
    @endsection

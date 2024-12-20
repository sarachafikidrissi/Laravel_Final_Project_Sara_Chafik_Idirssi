
@extends('Gym.index')

@section('content')
<div class="">
    @include('Gym.layouts.nav')
        <div class=" w-screen flex flex-row-reverse register  ">
            <div class="w-[50%] flex  justify-centerp-5 h-[90vh] pt-4">
                <div class="w-[80%] h-fit  flex flex-col justify-center  p-6  rounded-md shadow-lg bg-black bg-opacity-[0.9]">
                 
                    <form enctype="multipart/form-data" method="POST" action="{{ route('register') }}" class=" w-full h-full flex flex-col gap-y-2">
                        @csrf
                    
                        <!-- Hidden input for role -->
                        <input type="hidden" name="role" value="{{ $trainer->id }}">
                    
                        {{-- <div class="flex justify-between items-center gap-x-4"> --}}
                            <!-- Name -->
                            <div class="">
                                <label for="name" class="text-[#FF9D52] font-medium">Name</label>
                                <input 
                                    id="name" 
                                    class="block mt-1 w-full text-black focus:ring-yellow-500 focus:border-yellow-500" 
                                    type="text" 
                                    name="name" 
                                    placeholder="Enter your full name" 
                                    value="{{ old('name') }}" 
                                    required 
                                    autofocus 
                                    autocomplete="name">
                                @error('name')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                    
                            <!-- Email Address -->
                            <div class="">
                                <label for="email" class="text-[#FF9D52] font-medium">Email</label>
                                <input 
                                    id="email" 
                                    class="block mt-1 w-full text-black focus:ring-yellow-500 focus:border-yellow-500" 
                                    type="email" 
                                    name="email" 
                                    placeholder="Enter your email address" 
                                    value="{{ old('email') }}" 
                                    required 
                                    autocomplete="username">
                                @error('email')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        {{-- </div> --}}
                    
                        <!-- Age -->
                        <div class="">
                            <label for="age" class="text-[#FF9D52] font-medium">Age</label>
                            <input 
                                id="age" 
                                class="block mt-1 w-full text-black focus:ring-yellow-500 focus:border-yellow-500" 
                                type="number" 
                                min="15" 
                                name="age" 
                                placeholder="Enter your age" 
                                value="{{ old('age') }}" 
                                required 
                                autofocus>
                        </div>
                    
                        <!-- Gender -->
                        <div class="">
                            <label for="gender" class="text-[#FF9D52] font-medium">Gender</label>
                            <div class="flex justify-between text-white">
                                <div class="">
                                    <label class="inline-flex items-center">
                                        <input 
                                            type="radio" 
                                            name="gender" 
                                            value="female" 
                                            class="focus:ring-yellow-500 focus:ring-offset-2 text-yellow-400"
                                            required>
                                        <span class="ml-2">Female</span>
                                    </label>
                                </div>
                                <div class="">
                                    <label class="inline-flex items-center">
                                        <input 
                                            type="radio" 
                                            name="gender" 
                                            value="male"
                                            class="focus:ring-yellow-500 focus:ring-offset-2 text-yellow-400"
                                            required>
                                        <span class="ml-2">Male</span>
                                    </label>
                                </div> 
                            </div>
                        </div>
                    
                        <!-- Image -->
                        <div class="">
                            <label for="image" class="text-[#FF9D52] font-medium">Image</label>
                                <div class="flex items-center space-x-6">
                                    <div class="shrink-0">
                                      <img id='preview_img' class="h-16 w-16 object-cover rounded-full" src="https://lh3.googleusercontent.com/a-/AFdZucpC_6WFBIfaAbPHBwGM9z8SxyM1oV4wB4Ngwp_UyQ=s96-c" alt="Current profile photo" />
                                    </div>
                                    <label class="block">
                                      <span class="sr-only">Choose profile photo</span>
                                      <input type="file" 
                                      id="image" 
                                      accept="image/*" 
                                      name="image" 
                                      placeholder="Upload your profile picture" onchange="loadFile(event)" class="block w-full text-sm text-slate-500
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-full file:border-0
                                        file:text-sm file:font-semibold
                                        file:bg-violet-50 file:text-violet-700
                                        hover:file:bg-violet-100
                                      "/>
                                    </label>
                                  </div>
          
                                
                        </div>
                        
                          
                          
                        <!-- Password -->
                        <div class="text-[#FF9D52] font-medium">
                            <label for="password">Password</label>
                            <input 
                                id="password" 
                                class="block mt-1 w-full text-black focus:ring-yellow-500 focus:border-yellow-500" 
                                type="password" 
                                name="password" 
                                placeholder="Enter your password" 
                                required 
                                autocomplete="new-password">
                            @error('password')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <!-- Confirm Password -->
                        <div class="text-[#FF9D52] font-medium">
                            <label for="password_confirmation">Confirm Password</label>
                            <input 
                                id="password_confirmation" 
                                class="block mt-1 w-full text-black focus:ring-yellow-500 focus:border-yellow-500" 
                                type="password" 
                                name="password_confirmation" 
                                placeholder="Confirm your password" 
                                required 
                                autocomplete="new-password">
                            @error('password_confirmation')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <!-- Already Registered Link -->
                        <div class="flex items-center gap-x-3 justify-end mt-4 ">
                            <a href="{{ route('login') }}" class="underline text-sm text-[#fff500] hover:text-yellow-400">
                                Already registered?
                            </a>
                    
                            <button type="submit" class="bg-[#FF9D52] rounded-xl hover:rounded-none cursor-pointer  text-black hover:bg-black hover:text-[#FF9D52] hover:border hover:border-[#FF9D52] px-10 py-2  ">
                                Next
                            </button>
                        </div>
                    </form>
                </div>
            </div>
    
    
            <div class="w-[50%]   flex flex-col pt-40 items-center ">
                <div class="logo flex justify-center items-center">
                    <img src="{{ asset('storage/images/logo.png') }}" alt="logo" class="w-[100px] h-[100px] object-contain">
                    <h1 class="text-4xl font-bold text-white">GymFit</h1>
                </div>
                <h1 class="text-white text-[55px] font-semibold">Trainer Registration Form</h1>
                <span class="text-white text-xl font-thin">Please create an account in <span class="font-bold text-md">GymFit</span> as a trainer </span>
            </div>
    
        </div>

</div>

<script>
    var loadFile = function(event) {
        
        var input = event.target;
        var file = input.files[0];
        var type = file.type;

       var output = document.getElementById('preview_img');


        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
@endsection


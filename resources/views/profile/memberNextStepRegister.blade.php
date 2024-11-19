@extends('Gym.index')

@section('content')


<div class=" bg-black flex flex-col items-center justify-center text-white">
    <div class=" mt-10">
        <img src="{{ asset('storage/images/start.png') }}" alt="" class="">
    </div>

    <div class="flex flex-col gap-y-4">
        <div class="flex flex-col items-center">
            <h1 class="text-[40px]">Gym Fit Registration Form</h1>
            <span class="text-xl">Join our gym and start your fitness journey today! Please fill out the form
                to register.</span>
        </div>

        <div class=" w-[80vw] p-10 border-t border-b border-[#FF9D52]">
            <h1 class="text-[30px] font-semibold">Personal Information</h1>
        </div>

        <div>
          
            
            <form method="POST" action="{{ route('store.member') }}">
                @csrf
            
                <!-- Hidden input for user ID -->
                <input type="hidden" name="user" value="{{ $user->id }}">
            
                <!-- Weight -->
                <div class="w-[50%]">
                    <label for="weight" class="text-[#FF9D52] font-medium">Weight</label>
                    <input 
                        id="weight" 
                        class="block mt-1 w-full focus:ring-yellow-500 focus:border-yellow-500 text-black" 
                        type="number" 
                        min="30" 
                        name="weight" 
                        placeholder="Enter your weight (kg)" 
                        
                        value="{{ old('weight') }}" 
                        autofocus>
                    @error('weight')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
            
                <!-- Height -->
                <div class="w-[50%] mt-4">
                    <label for="height" class="text-[#FF9D52] font-medium">Height</label>
                    <input 
                        id="height" 
                        class="block mt-1 w-full focus:ring-yellow-500 focus:border-yellow-500 text-black" 
                        type="number" 
                        min="100" 
                        name="height" 
                        placeholder="Enter your height (cm)" 
                        value="{{ old('height') }}" 
                        autofocus>
                    @error('height')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
            
                <!-- Activity Level -->
                <div class="w-full mt-4">
                    <label for="activity" class="text-[#FF9D52] font-medium">Activity Level</label>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" name="activity" value="1.2" class="focus:ring-yellow-500 focus:ring-offset-2 text-yellow-400" required>
                            <span class="ml-2">Little or no exercise</span>
                        </label>
                    </div>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" name="activity" value="1.375" class="focus:ring-yellow-500 focus:ring-offset-2 text-yellow-400" required>
                            <span class="ml-2">Sports 1–3 days/week</span>
                        </label>
                    </div>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" name="activity" value="1.55" class="focus:ring-yellow-500 focus:ring-offset-2 text-yellow-400" required>
                            <span class="ml-2">Sports 3–5 days/week</span>
                        </label>
                    </div>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" name="activity" value="1.725" class="focus:ring-yellow-500 focus:ring-offset-2 text-yellow-400" required>
                            <span class="ml-2">Sports 6–7 days/week</span>
                        </label>
                    </div>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" name="activity" value="1.9" class="focus:ring-yellow-500 focus:ring-offset-2 text-yellow-400" required>
                            <span class="ml-2">Twice daily</span>
                        </label>
                    </div>
                    @error('activity')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
            
                <!-- Already Registered Link and Submit Button -->
                <div class="flex items-center justify-end mt-4 gap-x-4 mb-10">
                    <a href="{{ route('login') }}" class="underline text-sm text-[#fff500] hover:text-yellow-400">
                        Already registered?
                    </a>
            
                    <button type="submit"  class="bg-[#FF9D52] rounded-xl hover:rounded-none cursor-pointer  text-black hover:bg-black hover:text-[#FF9D52] hover:border hover:border-[#FF9D52] px-10 py-2  ">
                        Register
                    </button>
                </div>
            </form>
            
        </div>


    </div>
</div>
    
@endsection
    


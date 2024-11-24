
@extends('Gym.index')

@section('content')
<div>
    @include('Gym.layouts.nav')
        <div class=" w-screen h-screen flex test">
            <div class="w-[50%] flex justify-center mt-10">
                <div class="w-[80%] h-[80%] flex flex-col justify-center gap-y-8  p-6  rounded-md shadow-lg bg-white bg-opacity-[0.1]">
                    <form method="POST" action="{{ route('login') }}"  class="flex flex-col gap-y-10 p-4">
                        <h1 class="text-[#ff9d52] text-[40px] font-bold text-center">Login</h1>
                        @csrf
                        
                        <div>
                            <!-- Email Address -->
                            <div class="mb-4">
                                {{-- <label for="email" class="block text-[#FF9D52] font-medium mb-1">Email</label> --}}
                                <input 
                                    id="email" 
                                    class="block mt-1 w-full border-gray-300 focus:ring-yellow-500 focus:border-yellow-500 rounded-md shadow-sm" 
                                    type="email" 
                                    name="email" 
                                    placeholder="Enter your email" 
                                    value="{{ old('email') }}" 
                                    required 
                                    autofocus 
                                    autocomplete="username">
                                @error('email')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                    
                            <!-- Password -->
                            <div class="mb-4">
                                {{-- <label for="password" class="block text-[#FF9D52] font-medium mb-1">Password</label> --}}
                                <input 
                                    id="password" 
                                    class="block mt-1 w-full border-gray-300 focus:ring-yellow-500 focus:border-yellow-500 rounded-md shadow-sm" 
                                    type="password" 
                                    name="password" 
                                    placeholder="Enter your password" 
                                    required 
                                    autocomplete="current-password">
                                @error('password')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Remember Me -->
                            <div class="block mb-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input 
                                        id="remember_me" 
                                        type="checkbox" 
                                        class="rounded border-gray-300 text-yellow-500 shadow-sm focus:[#ff9d52]" 
                                        name="remember">
                                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                                </label>
                            </div>
                        </div>
                
                
                        <div class="flex flex-col-reverse gap-y-2 items-center justify-between">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm text-gray-600 hover:text-yellow-500 underline">
                                    Forgot your password?
                                </a>
                            @endif
                
                            <button 
                                type="submit" 
                                class="ms-3 w-full px-4 py-2 bg-[#ff9d52] text-white font-medium rounded-md shadow-md hover:bg-[#e68c48] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                Log in
                            </button>
                        </div>
                    </form>
    
                </div>
            </div>
    
    
            <div class="w-[50%] h-[70%] flex flex-col justify-center items-center">
                <div class="logo flex justify-center items-center">
                    <img src="{{ asset('storage/images/logo-removebg-preview.png') }}" alt="logo" class="w-[100px] h-[100px] object-contain">
                    <h1 class="text-4xl font-bold text-white">GymFit</h1>
                </div>
                <h1 class="text-white text-[80px] font-semibold">Welcome Back! </h1>
                <span class="text-white text-xl font-thin">Please login to <span class="font-bold text-md">GymFit</span> with your email address </span>
            </div>
    
        </div>

</div>
@endsection

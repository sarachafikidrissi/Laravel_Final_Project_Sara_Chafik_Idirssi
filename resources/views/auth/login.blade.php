{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}



@extends('Gym.index')

@section('content')
    <div class="bg-black w-screen h-screen flex ">


        <div class="w-[50%] h-screen flex justify-center items-center">
            <div class="w-[80%] h-[95%] flex flex-col gap-y-10 p-6  rounded-md shadow-lg bg-white bg-opacity-[0.1]">

                <div class="logo flex justify-center items-center">
                    <img src="{{ asset('storage/images/logo-removebg-preview.png') }}" alt="logo" class="w-[80px] h-[80px] object-contain">
                    <h1 class="text-3xl font-bold text-white">GymFit</h1>
                </div>
                <h1 class="text-[#fff500] text-[40px] font-bold text-center">Login</h1>
                <form method="POST" action="{{ route('login') }}"  class="flex flex-col gap-y-10">
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
                                    class="rounded border-gray-300 text-yellow-500 shadow-sm focus:ring-yellow-500" 
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
                            class="ms-3 w-full px-4 py-2 bg-yellow-500 text-white font-medium rounded-md shadow-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                            Log in
                        </button>
                    </div>
                </form>

            </div>
        </div>


        <div class="w-[50%]">
            <img src="{{ asset('landingPage/gym.avif') }}" alt="" class="h-screen w-full object-cover">
        </div>

    </div>
@endsection

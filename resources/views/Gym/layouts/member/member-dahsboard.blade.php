@extends('Gym.index')

@section('content')


<div class="flex p-2 gap-x-4 bg-black/5">
    <div class="w-[20vw] h-[95vh] rounded-xl bg-black text-white ">
        @include('Gym.layouts.sidebar')    
    </div>
    <div class="w-[80vw] flex flex-col gap-y-2 bg-black/5p-2">
        @include('Gym.layouts.headbar')
        @include('Gym.layouts.contents')
          
            
    </div>

@endsection
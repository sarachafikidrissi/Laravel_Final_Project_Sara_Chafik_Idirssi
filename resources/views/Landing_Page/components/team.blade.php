<div class=" w-[80vw] mt-10 mx-auto flex flex-col gap-y-10 items-center text-white relative z-[1]">
    <div class="relative text-center">
        <!-- Large background text -->
        <h1 class="text-8xl font-bold  text-[#7e736b] opacity-20 select-none">
          OUR TEAM
        </h1>
        <!-- Foreground text -->
        <h2 class="absolute  inset-0 top-20   flex justify-center items-center text-white text-[40px] font-bold">
          OUR TEAM
        </h2>
    </div>  
    
    <div class="flex justify-center mb-20">
        <div class=" flex flex-wrap w-[75vw] gap-[1vw] ">
            @foreach ($teams as $team)
            <div class="w-[18vw] h-[20vh] bg-white relative team">
                <img src="{{ asset('storage/' . $team->image) }}" alt="" class="w-full h-full object-cover">
                <div class="w-full h-full bg-[#fff500] absolute inset-0 hidden team-info gap-y-2">
                    <h1 class="text-xl w-[10vw] text-center font-bold text-black uppercase">{{ $team->name }}</h1>
                    <div class="w-[10vw] h-[2px] bg-black"></div>
                    <h3 class="font-thin text-xl text-black">Coach</h3>
                </div>   
            </div>    
            @endforeach
        </div>
    </div>
    <div class="diagonal-yellow z-[-2]"></div>
</div>
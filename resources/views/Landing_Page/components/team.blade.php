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
        <div class=" flex flex-wrap w-[75vw] gap-[1vw]">
            @foreach ($teams as $team)
            <div class="w-[18vw] h-[20vh] bg-white">
                <img src="{{ asset('storage/' . $team->image) }}" alt="" class="w-full h-full object-cover">      
            </div>    
            @endforeach
        </div>
    </div>
    <div class="diagonal-yellow z-[-2]"></div>
</div>
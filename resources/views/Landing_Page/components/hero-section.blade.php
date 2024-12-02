<div id="herosection" class="w-[80vw] h-[80vh] mx-auto flex relative text-white">
    <div class=" w-[50vw]  h-full  ">
        <div class="bg-transparent h-[50%] w-[80%] absolute top-10 ">
            <h1 class="uppercase text-white font-bold text-[60px] mt-10">Every <span class="text-[#fff500]">great transformation</span>  starts with a single step, <span class="text-[#fff500]">take yours today</span></h1>
            <div class="flex gap-x-2">
                <a href="{{ route('register') }}" class="hover:bg-[#fff500] hover:text-black bg-black border border-[#fff500] text-[#fff500] px-4 py-2  font-bold rounded-xl cursor-pointer hover:rounded-none">Join Team</a>
            <a href="{{ route('trainer') }}" class="hover:bg-[#FF9D52] rounded-xl hover:rounded-none cursor-pointer  hover:text-black bg-black text-[#FF9D52] border  border-[#FF9D52] px-4 py-2 font-bold ">Become a member</a>
            </div>
        </div>
    </div>
    <div class=" w-[50vw] h-full ">
        <img src="{{ asset('landingPage/gym.avif') }}" alt="" class="w-full h-full object-cover">      
    </div>
</div>

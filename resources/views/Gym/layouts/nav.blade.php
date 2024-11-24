<div class="bg-black h-[10vh] flex items-center justify-between px-20 navvv">
    <div class="logo flex justify-center items-center">
        <img src="{{ asset('storage/images/logo-removebg-preview.png') }}" alt="logo"
            class="w-[80px] h-[80px] object-contain">
        <h1 class="text-3xl font-bold text-white">GymFit</h1>
    </div>
   
    <div class="flex gap-x-4 items-center ">
        <div class="links text-white font-thin flex gap-x-4 uppercase">
            <a href="{{ route('guest-app') }}" class="hover:text-[#333333] cursor-pointer">Home</a>
        </div>
        <a href="{{ route('trainer') }}"
            class=" hover:text-white bg-black font-thin  text-[#fff500]    cursor-pointer ">Register
            as Trainer</a>
        <a href="{{ route('register') }}"
            class="cursor-pointer  hover:text-white text-[#ff9f52] font-thin  ">Register
            as Member</a>
       
    </div>
</div>

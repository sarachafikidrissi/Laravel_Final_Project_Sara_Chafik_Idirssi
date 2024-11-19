<div class="bg-black h-[10vh] flex items-center justify-around">
    <div class="logo flex justify-center items-center">
        <img src="{{ asset('storage/images/logo-removebg-preview.png') }}" alt="logo" class="w-[80px] h-[80px] object-contain">
        <h1 class="text-3xl font-bold text-white">GymFit</h1>
    </div>
    <div class="links text-white font-thin flex gap-x-4 uppercase">
        <a href="{{ route('guest-app') }}" class="hover:text-[#333333] cursor-pointer">Home</a>
        <a href="#about" class="hover:text-[#333333] cursor-pointer">Who we are</a>
        <a href="#team" class="hover:text-[#333333] cursor-pointer">Team</a>
        <a href="#sessions" class="hover:text-[#333333] cursor-pointer">Sessions</a>
        <a href="#faq" class="hover:text-[#333333] cursor-pointer">Faq</a>
    </div>
    <div class="flex gap-x-4 items-center ">
        <a href="{{ route('trainer') }}"   class="hover:bg-[#fff500] hover:text-black bg-black border border-[#fff500] text-[#fff500] px-4 py-2   rounded-xl cursor-pointer hover:rounded-none">Join Team</a>
        <a  href="{{ route('register') }}" class="bg-[#FF9D52] rounded-xl hover:rounded-none cursor-pointer  text-black hover:bg-black hover:text-[#FF9D52] hover:border hover:border-[#FF9D52] px-4 py-2  ">Become a member</a>
        <div class="flex gap-x-1 text-xl text-white hover:text-[#fff70084]">
            <i class="bi bi-person "></i>
            <a href="{{ route('login') }}" class=" cursor-pointer ">Login</a>
        </div>
    </div>
</div>




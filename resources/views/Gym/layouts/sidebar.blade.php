
<div class="w-full h-full flex justify-center items-center">
    <div class="text-white  flex flex-col w-[80%] h-[95%]">
        <div class="logo flex justify-center items-center">
            <img src="{{ asset('storage/images/logo-removebg-preview.png') }}" alt="logo" class="w-[80px] h-[80px] object-contain">
            <h1 class="text-3xl font-bold text-[#FF9D52]">GymFit</h1>
        </div>

        <div class="w-fll h-full ">
            <div>
                @checkRole('admin')
                    @include('Gym.layouts.admin-sidebar')
                @endCheckRole

                @checkRole('trainer')
                    @include('Gym.layouts.trainer.trainer-sidebar')
                @endCheckRole
                
            </div>
        </div>
    </div>
        
</div>
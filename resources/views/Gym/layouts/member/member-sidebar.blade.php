<div class="flex flex-col w-full h-full  py-5 gap-y-10 text-xl text-white ">
    <a href="{{ route('member.dashboard') }}"
        class="flex items-center gap-x-3 px-2 py-1 rounded-md 
              {{ Route::is('member.dashboard') ? 'bg-[#FF9D52] text-white' : 'hover:bg-[#FF9D52] hover:text-white' }}">
        <div  class="border w-[40px] h-[40px] rounded-full bg-gray-900 border-transparent relative">
            <i class="bi bi-ui-radios-grid font-bold absolute left-[50%] translate-x-[-50%] bottom-[50%] translate-y-[50%]"></i>

        </div>
        <span>Dashboard</span>
    </a>

    <a href="{{ route('member.planing') }}"
        class="flex items-center gap-x-3 px-2 py-1 rounded-md 
              {{ Route::is('member.planing') ? 'bg-[#FF9D52] text-white' : 'hover:bg-[#FF9D52] hover:text-white' }}">
        <div  class="border w-[40px] h-[40px] rounded-full bg-gray-900 border-transparent relative">

            <i class="bi bi-calendar-week absolute left-[50%] translate-x-[-50%] bottom-[50%] translate-y-[50%]"></i>
        </div>
        <span >Join Session</span>
    </a>

    <a href="{{ route('trainer.exercices') }}"
        class="flex items-center gap-x-3 px-2 py-1 rounded-md 
              {{ Route::is('trainer.exercices') ? 'bg-[#FF9D52] text-white' : 'hover:bg-[#FF9D52] hover:text-white' }}">
        <div  class="border w-[40px] h-[40px] rounded-full bg-gray-900 border-transparent relative">

            <i class="bi bi-heart-pulse absolute left-[50%] translate-x-[-50%] bottom-[50%] translate-y-[50%]"></i>
        </div>
        <span>Favorites</span>
    </a>

    <a href="{{ route('member.reservation') }}"
        class="flex items-center gap-x-3 px-2 py-1 rounded-md 
              {{ Route::is('member.reservation') ? 'bg-[#FF9D52] text-white' : 'hover:bg-[#FF9D52] hover:text-white' }}">
        <div class="border w-[40px] h-[40px] rounded-full bg-gray-900 border-transparent relative">
            <i
                class="bi bi-calendar2-plus-fill  absolute left-[50%] translate-x-[-50%] bottom-[50%] translate-y-[50%] "></i>
        </div>
        <span>Reservations</span>
    </a>
</div>

<div class="flex flex-col w-full h-full  py-5 gap-y-10 text-xl text-white ">
    <a href="{{ route('main.dashboard') }}" 
       class="flex items-center gap-x-3 px-2 py-1 rounded-md 
              {{ Route::is('main.dashboard') ? 'bg-[#FF9D52] text-white' : 'hover:bg-[#FF9D52] hover:text-white' }}">
        <i class="bi bi-ui-radios-grid font-bold"></i> 
        <span>Dashboard</span>
    </a>

    <a href="{{ route('trainer.sessions') }}" 
       class="flex items-center gap-x-3 px-2 py-1 rounded-md 
              {{ Route::is('trainer.sessions') ? 'bg-[#FF9D52] text-white' : 'hover:bg-[#FF9D52] hover:text-white' }}">
              <i class="bi bi-megaphone"></i>
        <span>Sessions</span>
    </a>

    <a href="{{ route('trainer.exercices') }}" 
       class="flex items-center gap-x-3 px-2 py-1 rounded-md 
              {{ Route::is('trainer.exercices') ? 'bg-[#FF9D52] text-white' : 'hover:bg-[#FF9D52] hover:text-white' }}">
              <i class="bi bi-person-arms-up"></i> 
        <span>Exercices</span>
    </a>

    <a href="" 
       class="flex items-center gap-x-3 px-2 py-1 rounded-md 
              {{ Route::is('admin.planning') ? 'bg-[#FF9D52] text-white' : 'hover:bg-[#FF9D52] hover:text-white' }}">
        <i class="bi bi-calendar3 font-bold"></i> 
        <span>Calendar</span>
    </a>
</div>

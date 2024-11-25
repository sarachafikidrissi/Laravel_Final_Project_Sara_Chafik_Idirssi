@checkRole('admin')
<div class="flex flex-col w-full h-full py-5 gap-y-10 text-xl text-white ">
    <a href="{{ route('admin.dashboard') }}" 
       class="flex items-center gap-x-3 px-2 py-1 rounded-md 
              {{ Route::is('admin.dashboard') ? 'bg-[#FF9D52] text-white' : 'hover:bg-[#FF9D52] hover:text-white' }}">
        <i class="bi bi-ui-radios-grid font-bold"></i> 
        <span>Dashboard</span>
    </a>

    <a href="{{ route('admin.users') }}" 
       class="flex items-center gap-x-3 px-2 py-1 rounded-md 
              {{ Route::is('admin.users') ? 'bg-[#FF9D52] text-white' : 'hover:bg-[#FF9D52] hover:text-white' }}">
        <i class="bi bi-person-bounding-box font-bold"></i> 
        <span>Members</span>
    </a>

    <a href="{{ route('admin.requests') }}" 
       class="flex items-center gap-x-3 px-2 py-1 rounded-md 
              {{ Route::is('admin.requests') ? 'bg-[#FF9D52] text-white' : 'hover:bg-[#FF9D52] hover:text-white' }}">
        <i class="bi bi-person-plus-fill font-bold"></i> 
        <span>Trainers Requests</span>
    </a>

    <a href="{{ route('admin.planing') }}" 
       class="flex items-center gap-x-3 px-2 py-1 rounded-md 
              {{ Route::is('admin.planing') ? 'bg-[#FF9D52] text-white' : 'hover:bg-[#FF9D52] hover:text-white' }}">
        <i class="bi bi-calendar3 font-bold"></i> 
        <span>Planning</span>
    </a>
</div>
@endCheckRole

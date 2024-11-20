<div class="w-full h-[10vh] bg-black  header-shadow   text-[#f8b781] py-6 px-5 flex justify-between items-center rounded-xl">
    <div class="flex items-center gap-x-2">
        <div class="w-[50px] h-[50px] rounded-full shadow-xl">
            <h1 class="'text-white">{{ $authUser }}</h1> 
            @if (Auth::user()->id == 1)
            <img src="{{ asset('storage/images/profile/admin.avif') }}" alt="hhh" class="w-[50px] h-[50px] rounded-full object-cover">
            @else
            <img src="{{ asset('storage/images/profile/' . Auth::user()->image) }}" alt="hhh" class="w-[50px] h-[50px] rounded-full object-cover">               
            @endif

        </div>
        <h1 class="text-white text-xl ">Welcome back, {{ Auth::user()->name }} 👋.</h1>

    </div>

    <div class="flex">
        
        
         <!-- Settings Dropdown -->
         <div class="hidden sm:flex sm:items-center sm:ms-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent bg-[#FF9D52] text-sm leading-4 font-medium rounded-md text-black dark:text-gray-400  dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
</div>
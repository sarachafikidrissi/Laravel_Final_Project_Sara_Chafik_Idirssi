<div class="flex flex-col w-[22vw]  px-4 rounded-xl bg-black h-[84vh] py-5 gap-y-2 text-xl text-white ">
    <div>
        <span class="text-sm font-semibold">Profile</span>
        <!-- Dropdown Menu -->
        {{-- <div class="relative bottom-8">
            <button class="text-white   ps-20 absolute right-0" onclick="toggleDropdown({{ $exercice->id }})">
                <i class="bi bi-three-dots text-sm font-semibold"></i>
            </button>
            <!-- Dropdown Menu Content -->
            <div id="dropdown-{{ $exercice->id }}"
                class="hidden z-10 absolute right-0 top-5  w-32 bg-white rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                <div class="">
                    <button data-task-id="{{ $exercice->id }}" type="button"
                        onclick="document.getElementById('editModal-{{ $exercice->id }}').classList.remove('hidden');"
                        class="text-gray-600 block px-4 py-1 text-sm">
                        Edit
                    </button>
                    <form method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 block px-4 pb-2 text-sm "
                            onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div> --}}
    </div>

    <div class="flex flex-col gap-y-2 items-center">
        <img src="{{ asset('storage/images/profile/' . Auth::user()->image) }}" alt="hhh"
            class="w-[50px] h-[50px] rounded-full object-cover">
        <h1 class="text-sm font-semibold">{{ Auth::user()->name }}</h1>
    </div>

    <div class="flex justify-between items-center  border-t border-b py-2 border-[#FF9D52]">
        <div class="flex flex-col items-center">
            <span class="font-semibold text-sm">{{ Auth::user()->weight }} kg</span>
            <span class="text-sm text-gray-600 ">Weight</span>
        </div>
        <div class="flex flex-col items-center">
            <span class="font-semibold text-sm">{{ Auth::user()->height }} cm</span>
            <span class="text-sm text-gray-600 ">Height</span>
        </div>
        <div class="flex flex-col items-center">
            <span class="font-semibold text-sm">{{ Auth::user()->age }}</span>
            <span class="text-sm text-gray-600 ">Age</span>
        </div>
    </div>

    <div class="flex w-full  flex-col rounded-xl bg-white/10  shadow-md p-4">
        <!-- Month and Year Header -->
        <div class="flex justify-between items-center w-full  text-white">
            <button class="text-gray-300 hover:text-f9ac54 transition duration-300" id="prev-month">
                <span class="text-[#FF9D52]">&lt;</span>
            </button>
            <h2 id="current-month" class="text-lg font-bold"></h2>
            <button class="text-gray-300 hover:text-f9ac54 transition duration-300" id="next-month">
                <span class="text-[#FF9D52]">&gt;</span>
            </button>
        </div>

        <!-- Days of the Week -->
        <div class="grid grid-cols-7 text-center text-sm border-b pb-1 border-[#FF9D52] text-gray-400 ">
            <span>S</span>
            <span>M</span>
            <span>T</span>
            <span>W</span>
            <span>T</span>
            <span>F</span>
            <span>S</span>
        </div>

        <!-- Days -->
        <div id="calendar-days" class="grid grid-cols-7  text-center text-white">
            <!-- Days will be dynamically inserted here -->
        </div>
    </div>

    <div class="flex flex-col gap-y-2">
        <span class="text-sm font-semibold">Scheduled</span>

        <div class="flex justify-between items-center border p-2 border-[#FF9D52] rounded-md">
            <span class="text-sm text-white/70 font-bold">Session Name</span>
            <span class="text-sm text-gray-600 ">12 Apr</span>
        </div>
        <div class="flex justify-between items-center border p-2 border-[#FF9D52] rounded-md">
            <span class="text-sm text-white/70 font-bold">Session Name</span>
            <span class="text-sm text-gray-600 ">12 Apr</span>
        </div>

    </div>

</div>


<script>
    function toggleDropdown(id) {
        const dropdown = document.getElementById(`dropdown-${id}`);
        dropdown.classList.toggle("hidden");
    }

    function toggleCreateDropdown() {
        const dropdown = document.getElementById("createDropdown");
        dropdown.classList.toggle("hidden");
    }


    document.addEventListener('DOMContentLoaded', function() {
        const calendarDays = document.getElementById('calendar-days');
        const currentMonthEl = document.getElementById('current-month');
        const prevMonthBtn = document.getElementById('prev-month');
        const nextMonthBtn = document.getElementById('next-month');

        let date = new Date();

        function renderCalendar() {
            const year = date.getFullYear();
            const month = date.getMonth();

            // Set current month and year
            currentMonthEl.textContent = date.toLocaleDateString('en-US', {
                month: 'long',
                year: 'numeric',
            });

            // Clear existing days
            calendarDays.innerHTML = '';

            // Get first and last day of the current month
            const firstDay = new Date(year, month, 1).getDay();
            const lastDate = new Date(year, month + 1, 0).getDate();

            // Add empty slots for days before the first day
            for (let i = 0; i < firstDay; i++) {
                const emptySlot = document.createElement('div');
                calendarDays.appendChild(emptySlot);
            }

            // Add days of the month
            for (let day = 1; day <= lastDate; day++) {
                const dayElement = document.createElement('div');
                dayElement.textContent = day;
                dayElement.className =
                    'rounded-full w-[35px] h-[35px] cursor-pointer';

                // Highlight today's date
                const today = new Date();
                if (
                    day === today.getDate() &&
                    month === today.getMonth() &&
                    year === today.getFullYear()
                ) {
                    dayElement.classList.add('bg-[#FF9D52]', 'text-white');
                }

                calendarDays.appendChild(dayElement);
            }
        }

        // Event Listeners for Navigation
        prevMonthBtn.addEventListener('click', function() {
            date.setMonth(date.getMonth() - 1);
            renderCalendar();
        });

        nextMonthBtn.addEventListener('click', function() {
            date.setMonth(date.getMonth() + 1);
            renderCalendar();
        });

        // Initial Render
        renderCalendar();
    });
</script>

<!-- Modal -->
<div id="exerciceFormModal" class="fixed z-10 inset-0 top-10 overflow-y-auto hidden">
    <div class="flex items-center justify-center">
        <div class="bg-white w-1/2 px-4 rounded shadow-md mb-4">
            <div class="flex justify-end">
                <!-- Close Button -->
                <button id="closeExerciceForm" class="text-gray-700 hover:text-red-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <h2 class="text-2xl font-bold ">Add Exercice</h2>

            <form enctype="multipart/form-data" action="{{ route('exercice.store') }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value={{ Auth::user()->id }}>
                <div class="mb-2">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name"
                        class="w-full p-2 border rounded-md focus:outline-none focus:border-[#FF9D52]">
                </div>
                <div class="mt-4">
                    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Session Cover</label>
                    <div class="flex flex-col gap-y-2 ">
                        <div class="shrink-0">
                            <img id="preview_img" class="w-full h-[200px] object-cover"
                                src="{{ asset('landingPage/gym-banner.avif') }}"
                                alt="Current profile photo" />
                        </div>
                        <label class="block">
                            <span class="sr-only">Choose Exercice photo</span>
                            <input type="file" id="image" accept="image/*" name="image"
                                placeholder="Upload your profile picture" onchange="loadFile(event)"
                                class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4
                                              file:rounded-full file:border-0 file:text-sm file:font-semibold
                                              file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                        </label>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="" class="block text-gray-700 text-sm font-bold mb-2">Exercice Calories</label>
                    <input type="number" min="0" id="" name="calories" placeholder="Enter Exercice Calories"
                        class="w-full p-2 border rounded-md focus:outline-none focus:border-[#FF9D52]">
                </div>
                <button type="submit"
                    class="bg-[#FF9D52] mt-4 text-white font-bold py-2 px-4 mb-4 w-full rounded hover:bg-[#FF9D52] focus:ring focus:ring-offset-2 focus:ring-[#FF9D52]">
                    Add
                </button>

            </form>

        </div>

    </div>


    <script>
        // JavaScript to toggle the modal
        const openContactFormButton = document.getElementById('openExerciceForm');
        const closeContactFormButton = document.getElementById('closeExerciceForm');
        const contactFormModal = document.getElementById('exerciceFormModal');

        openContactFormButton.addEventListener('click', () => {
            contactFormModal.classList.remove('hidden');
        });

        closeContactFormButton.addEventListener('click', () => {
            contactFormModal.classList.add('hidden');
        });

        var loadFile = function(event) {

            var input = event.target;
            var file = input.files[0];
            var type = file.type;

            var output = document.getElementById('preview_img');


            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };

        // Get the current date and time
        const now = new Date();

        // Format the current date and time in the 'yyyy-MM-ddTHH:mm' format
        const formattedNow = now.toISOString().slice(0, 16);

        // Set the minimum allowed datetime to now
        const startInput = document.getElementById("start");
        startInput.min = formattedNow;

        // Set a time range restriction (e.g., no events allowed between 2 AM and 6 AM)
        startInput.addEventListener("input", () => {
            const selectedTime = new Date(startInput.value);
            const hours = selectedTime.getHours();

            // Check if the selected time falls within the restricted hours
            if (hours >= 22 && hours < 6) {
                alert("Events cannot be scheduled between 2:00 AM and 6:00 AM.");
                startInput.value = ""; // Clear the invalid selection
            }
        });
    </script>

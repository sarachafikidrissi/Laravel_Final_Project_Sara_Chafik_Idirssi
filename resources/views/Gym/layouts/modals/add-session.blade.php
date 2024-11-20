<!-- Modal -->
<div id="sessionFormModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white w-1/2 p-6 rounded shadow-md">
            <div class="flex justify-end">
                <!-- Close Button -->
                <button id="closeSessionForm" class="text-gray-700 hover:text-red-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            @if (Auth::user()->trainersRequestStatus == 'pending')
                <h1 class="text-xl font-bold mb-4">Your request is not Approved yet , you are not allowed to create
                    sessions</h1>
            @else
                <h2 class="text-2xl font-bold mb-4">Add Session</h2>

                <form enctype="multipart/form-data" action="{{ route('create.session') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value={{ Auth::user()->id }}>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your name"
                            class="w-full p-2 border rounded-md focus:outline-none focus:border-[#FF9D52]">
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                        <textarea id="description" name="description" placeholder="Enter a description"
                            class="w-full p-2 border rounded-md focus:outline-none focus:border-[#FF9D52]"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="start" class="block text-gray-700 text-sm font-bold mb-2">Event Start Day/
                            Time</label>
                        <input type="datetime-local" id="start" name="start"
                            class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="end" class="block text-gray-700 text-sm font-bold mb-2">Event End Day/
                            Time</label>
                        <input type="datetime-local" id="end" name="end"
                            class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="mt-4">
                        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Session Cover</label>
                        <div class="flex items-center space-x-6">
                            <div class="shrink-0">
                                <img id="preview_img" class="w-[200px] h-[100px] object-cover"
                                    src="https://lh3.googleusercontent.com/a-/AFdZucpC_6WFBIfaAbPHBwGM9z8SxyM1oV4wB4Ngwp_UyQ=s96-c"
                                    alt="Current profile photo" />
                            </div>
                            <label class="block">
                                <span class="sr-only">Choose profile photo</span>
                                <input type="file" id="image" accept="image/*" name="image"
                                    placeholder="Upload your profile picture" onchange="loadFile(event)"
                                    class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4
                                              file:rounded-full file:border-0 file:text-sm file:font-semibold
                                              file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                            </label>
                        </div>
                    </div>
                    <div class="w-[50%] mt-4">
                        <label for="" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                        <div class="mt-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="status" value="free"
                                    class="focus:ring-[#FF9D52] focus:ring-offset-2 text-yellow-400" required>
                                <span class="ml-2">Free</span>
                            </label>
                        </div>
                        <div class="mt-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="status" value="premium"
                                    class="focus:ring-[#FF9D52] focus:ring-offset-2 text-yellow-400" required>
                                <span class="ml-2">Premium</span>
                            </label>
                        </div>
                        <div class="mb-4">
                            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">If premium, Enter
                                Price</label>
                            <input type="number" id="price" name="price" min="1"
                                placeholder="Enter the price"
                                class="w-full p-2 border rounded-md focus:outline-none focus:border-[#FF9D52]">
                        </div>
                        <div class="mb-4">
                            <label for="spots" class="block text-gray-700 text-sm font-bold mb-2">Spots</label>
                            <input type="number" id="spots" name="spots" min="1"
                                placeholder="Enter the number of spots"
                                class="w-full p-2 border rounded-md focus:outline-none focus:border-[#FF9D52]">
                        </div>
                    </div>
                    <button type="submit"
                        class="bg-[#FF9D52] text-white font-bold py-2 px-4 rounded hover:bg-[#FF9D52] focus:ring focus:ring-offset-2 focus:ring-[#FF9D52]">
                        Add
                    </button>
                </form>
            @endif

        </div>

    </div>


    <script>
        // JavaScript to toggle the modal
        const openContactFormButton = document.getElementById('openSessionForm');
        const closeContactFormButton = document.getElementById('closeSessionForm');
        const contactFormModal = document.getElementById('sessionFormModal');

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

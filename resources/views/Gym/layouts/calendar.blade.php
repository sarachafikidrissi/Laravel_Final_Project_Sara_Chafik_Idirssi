<div class="w-[70vw]">
    <div>
        <button id="joinSession" class="hidden bg-rose-500 text-white rounded-md px-4 py-2 hover:bg-rose-700 transition"
            onclick="openModal('modelConfirm')">
            Click to Open modal
        </button>
        <div id="modelConfirm"
            class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
            <div class="relative top-40 mx-auto rounded-md bg-white border border-[#ff9d52] max-w-md">

                <div class="flex justify-end p-2">
                    <h1 id="sessionStatus" class="text-xl  text-[#ff8000] font-bold capitalize"></h1>
                    <button onclick="closeModal('modelConfirm')" type="button"
                        class="text-[#ff952f] bg-transparent hover:bg-[#ff952f] hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>

                </div>

                <div class="flex flex-col">
                    <div class="px-4 pt-0 flex items-center  justify-between">
                        <div class="flex w-full flex-col ">
                            <div class="flex w-full justify-between items-center">
                                <div class="flex flex-col">
                                    <h1 id="sessionName" class="text-3xl  text-black font-semibold"></h1>
                                    <div class="flex items-center gap-x-2">
                                        <h1 class="text-sm  text-black font-semibold">Spots Avaible: </h1>
                                        <h1 id="sessionSpots" class="text-md  text-black "></h1>
                                    </div>
                                </div>
                                <div class="w-[100px] h-[100px]">
                                    <img id="sessionImage" src="" alt="session-image"
                                        class="w-full h-full object-cover rounded-full">
                                </div>


                            </div>
                            <div id="sessionInfo">
                                <h1 class="text-md  text-black font-semibold">Description: </h1>
                                <p id="sessionDescription" class="w-full h-fit">Lorem ipsum dolor, sit amet consectetur
                                    adipisicing elit. Illum, placeat?Lorem ipsum dolor,</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <h1 class="text-md  text-black font-semibold">price: </h1>
                                <p id="sessionPrice" class="text-xl font-bold text-red-900"></p>
                            </div>
                        </div>


                    </div>
                    <div class="px-4 mb-6 mt-3">
                        <div class="flex ">
                            <form method="post" action="{{ route('session.join') }}">
                                @csrf
                                <input type="text" value={{ Auth::user()->id }} name="user_id" class="hidden">
                                <input type="text" id="sesId" name="trainer_session_id" class="hidden">
                                <button onclick="closeModal('modelConfirm')"
                                    class="text-white bg-[#ff952f] hover:bg-[#63482f] focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                                    Join Session
                                </button>
                            </form>
                            <a href="#" onclick="closeModal('modelConfirm')"
                                class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center"
                                data-modal-toggle="delete-user-modal">
                                No, cancel
                            </a>

                        </div>
                    </div>

                </div>


            </div>
        </div>

    </div>
    <div class="w-full">
        <div class="w-full h-[84vh] p-3" id="memberCalendar">
            @foreach (Auth::user()->roles as $role)
                <input class="hidden" id="authRole" type="text" value={{ $role->role }}>
                <div>

                </div>
            @endforeach
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', async function() {
            let response = await axios.get("/create/session")

            let sessions = response.data.events


            const currentTime = new Date();

            // Filter out past events
            const upcomingEvents = sessions.filter(event => new Date(event.start) > currentTime);

            // console.log(sessions);


            let nowDate = new Date()
            // let day = nowDate.getDate()
            // let month = nowDate.getMonth() + 1
            // let hours = nowDate.getHours()
            // let minutes = nowDate.getMinutes()
            // let minTimeAllowed =
            //     `${nowDate.getFullYear()}-${month < 10 ? "0"+month : month}-${day < 10 ? "0"+day : day}T${hours < 10 ? "0"+hours : hours}:${minutes < 10 ? "0"+minutes : minutes}:00`
            // start.min = minTimeAllowed;


            var myCalendar = document.getElementById('memberCalendar');


            var calendar = new FullCalendar.Calendar(myCalendar, {

                headerToolbar: {
                    left: 'dayGridMonth,timeGridWeek,timeGridDay',
                    center: 'title',
                    right: 'prev,next'
                },


                views: {
                    listDay: { // Customize the name for listDay
                        buttonText: 'Day Sessions',

                    },
                    listWeek: { // Customize the name for listWeek
                        buttonText: 'Week Sessions'
                    },
                    listMonth: { // Customize the name for listMonth
                        buttonText: 'Month Sessions'
                    },
                    timeGridWeek: {
                        buttonText: 'Week', // Customize the button text
                    },
                    timeGridDay: {
                        buttonText: "Day",
                    },
                    dayGridMonth: {
                        buttonText: "Month",
                    },

                },


                initialView: "timeGridWeek", // initial view  =   l view li kayban  mni kan7ol l  calendar
                slotMinTime: "09:00:00", // min  time  appear in the calendar
                slotMaxTime: "19:00:00", // max  time  appear in the calendar
                nowIndicator: true, //  indicator  li kaybyen  l wa9t daba   fin  fl calendar
                selectable: true, //   kankhali l user  i9ad  i selectioner  wast l calendar
                selectMirror: true, //  overlay   that show  the selected area  ( details  ... )
                selectOverlap: false, //  nkhali ktar mn event f  nfs  l wa9t  = e.g:   5 nas i reserviw nfs lblasa  f nfs l wa9t
                weekends: true, // n7ayed  l weekends    ola nkhalihom 


                // events  hya  property dyal full calendar
                //  kat9bel array dyal objects  khass  i kono jayin 3la chkl  object fih  start  o end  7it hya li kayfahloha
                events: upcomingEvents,


                selectAllow: (info) => {
                    return info.start >= nowDate;
                },

                select: (info) => {
                   

                    // if (info.end.getDate() - info.start.getDate() > 0 && !info.allDay) {
                    //     return
                    // }

                    // console.log(info);
                    // if (info.allDay) {
                    //     start.value = info.startStr + " 09:00:00"
                    //     end.value = info.startStr + " 19:00:00"

                    // } else {
                    //     start.value = info.startStr.slice(0, info.startStr.length - 6)
                    //     end.value = info.endStr.slice(0, info.endStr.length - 6)
                    // }

                    // openSessionForm.click()
                },

                eventClick: (info) => {




                    let sessionId = info.event._def.publicId
                    let userRoleId = authRole.value
                    let sessionTitle = info.event._def.title
                    let sessionCover = info.event._def.extendedProps.image
                    let spotsTotal = info.event._def.extendedProps.spots
                    let description = info.event._def.extendedProps.description
                    let status = info.event._def.extendedProps.status
                    let price = info.event._def.extendedProps.price


                    if (validateOwner(info)) {
                        openSession.click();
                        sessionName.textContent = "Update or Delete Your Session"
                        deleteSessionForm.action = `/session/destroy/${sessionId}`
                        updateLink.href = `/session/edit/${sessionId}`
                    } else if (userRoleId == 'member') {
                        sessionName.textContent = `${sessionTitle}`
                        sessionImage.src = `{{ asset('storage/images/sessions/${sessionCover}') }}`
                        sessionSpots.textContent = `${spotsTotal}`
                        sessionDescription.textContent = `${description}`
                        sesId.value = `${sessionId}`
                        if (status == 'premium') {
                            sessionPrice.textContent = `$${price}`
                        }
                        joinSession.click()

                    }

                },







            });

            calendar.render();

            function validateOwner(info) {
                let owner = info.event._def.extendedProps.owner
                let authUser = `{{ Auth::user()->id }}`

                return owner == authUser
            }

        })


        window.openModal = function(modalId) {
            document.getElementById(modalId).style.display = 'block'
            document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
        }

        window.closeModal = function(modalId) {
            document.getElementById(modalId).style.display = 'none'
            document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
        }

        // Close all modals when press ESC
        document.onkeydown = function(event) {
            event = event || window.event;
            if (event.keyCode === 27) {
                document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
                let modals = document.getElementsByClassName('modal');
                Array.prototype.slice.call(modals).forEach(i => {
                    i.style.display = 'none'
                })
            }
        };
    </script>

</div>

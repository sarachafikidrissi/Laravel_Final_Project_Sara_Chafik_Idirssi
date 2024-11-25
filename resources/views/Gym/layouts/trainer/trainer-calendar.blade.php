@extends('Gym.index')


@section('content')
    <div class="flex p-2 gap-x-4 bg-black/5   h-[100vh]">
        <div class="w-[20vw] h-[95vh] rounded-xl bg-black text-white ">
            @include('Gym.layouts.sidebar')
        </div>
        <div class="w-[80vw] flex flex-col gap-y-4 bg-black/5p-2">
            @include('Gym.layouts.headbar')
            <div class="w-full flex flex-col gap-y-2">
                <div class="">
                    <button id="openSession"
                        class="bg-rose-500 text-white rounded-md px-4 py-2 hover:bg-rose-700 transition hidden"
                        onclick="openModal('modelConfirm')">
                        Click to Open modal
                    </button>
                    @include('Gym.layouts.modals.calendar-modal')

                    {{-- <script type="text/javascript">
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
                     </script> --}}
                    @checkRole('trainer')
                        @if (Auth::user()->trainersRequestStatus == 'pending')
                            <h1 class="text-md text-red-900 mb-4"><i class="bi bi-exclamation-triangle"></i> Can't add sessions
                                for the moment , wait until your request will be approved by admin</h1>
                        @else
                            <button id="openSessionForm"
                                class="text-lg font-semibold text-[#ee7605e3] border px-2 rounded-md border-[#ee7605e3]">
                                <i class="bi bi-plus-circle text-xl text-[#ee7605e3]"></i>
                                Add Session
                            </button>
                            @include('Gym.layouts.modals.add-session')
                        @endif
                    @endCheckRole
                </div>
                <div class="w-full h-[80vh] p-3" id="calendar"></div>
            </div>

        </div>

    </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', async function() {
            let response = await axios.get("/create/session")

            let sessions = response.data.events
            console.log(sessions);

            const currentTime = new Date();

            // Filter out past events
            const upcomingEvents = sessions.filter(event => new Date(event.start) > currentTime);


            let nowDate = new Date()
            let day = nowDate.getDate()
            let month = nowDate.getMonth() + 1
            let hours = nowDate.getHours()
            let minutes = nowDate.getMinutes()
            let minTimeAllowed =
                `${nowDate.getFullYear()}-${month < 10 ? "0"+month : month}-${day < 10 ? "0"+day : day}T${hours < 10 ? "0"+hours : hours}:${minutes < 10 ? "0"+minutes : minutes}:00`
            start.min = minTimeAllowed;


            var myCalendar = document.getElementById('calendar');


            var calendar = new FullCalendar.Calendar(myCalendar, {

                headerToolbar: {
                    left: 'dayGridMonth,timeGridWeek,timeGridDay',
                    center: 'title',
                    right: 'listMonth,listWeek,listDay'
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


                    if (info.end.getDate() - info.start.getDate() > 0 && !info.allDay) {
                        return
                    }

                    console.log(info);
                    if (info.allDay) {
                        start.value = info.startStr + " 09:00:00"
                        end.value = info.startStr + " 19:00:00"

                    } else {
                        start.value = info.startStr.slice(0, info.startStr.length - 6)
                        end.value = info.endStr.slice(0, info.endStr.length - 6)
                    }

                    openSessionForm.click()
                },
                eventClick: (info) => {

                    let sessionId = info.event._def.publicId
                    if (validateOwner(info)) {
                        openSession.click();
                        sessionName.textContent = "Update or Delete Your Session"
                        deleteSessionForm.action = `/session/destroy/${sessionId}`
                        updateLink.href = `/session/edit/${sessionId}`
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
    </script>
@endsection

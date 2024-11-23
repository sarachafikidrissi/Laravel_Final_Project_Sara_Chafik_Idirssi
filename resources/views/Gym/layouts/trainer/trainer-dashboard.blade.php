@extends('Gym.index')


@section('content')
    <div class="flex p-2 gap-x-4 bg-black/5 h-[100vh]">
        <div class="w-[20vw] h-[95vh] rounded-xl bg-black text-white ">
            @include('Gym.layouts.sidebar')    
        </div>
        <div class="w-[80vw] flex flex-col gap-y-2 bg-black/5p-2">
            @include('Gym.layouts.headbar')
            <div class=" ">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <!-- Users Card -->
                  <div class="bg-white card-shadow  shadow-lg rounded-lg p-6 text-black flex items-center justify-between">
                    <div>
                      <h2 class="text-lg font-semibold text-[#ee7605e3]">Total Sessions</h2>
                      <p class="text-xl font-bold mt-4">{{  $totalSessions }}</p>
                    </div>
                    <div class="border border-[#ff7b00e3] p-4 w-[15px] h-[15px] rounded-full relative">
                        <i class="bi bi-people absolute translate-y-[-50%] translate-x-[-50%]"></i>
                    </div>
                  </div>
              
                  <!-- Trainers Card -->
                  <div class="bg-white card-shadow text-black  rounded-lg p-6 flex items-center justify-between">
                    <div>
                      <h2 class="text-lg font-semibold text-[#ee7605e3]">Total Exercices</h2>
                      <p class="text-xl font-bold mt-4">{{  $totalExercices }}</p>
                    </div>
                    <div class="border border-[#ff7b00e3] p-4 w-[15px] h-[15px] rounded-full relative">
                        <i class="bi bi-people absolute translate-y-[-50%] translate-x-[-50%]"></i>
                    </div>
                  </div>
                </div>
              
                <!-- Calendar and Numbers Cards -->
                {{-- <div class="grid grid-cols-1 md:grid-cols-1  mt-6"> --}}
                  <!-- Calendar Card -->
                  <div class="bg-white card-shadow rounded-lg p-6 mt-5 flex flex-col gap-y-2  h-[64vh]">
                      <h2 class="text-lg font-semibold text-[#ee7605e3]">Planning Calendar</h2>
                      <p class="text-xl font-bold">Today's Sessions</p>
                      <div class="w-full h-[50vh] p-3 border-2" id="planning"></div>
                   
                  </div>
              
                  
                {{-- </div> --}}
        </div>
        
        </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', async function() {
        let response = await axios.get("/create/session")

        let sessions = response.data.events
          var myCalendar = document.getElementById('planning');
          var calendar = new FullCalendar.Calendar(myCalendar, {

              headerToolbar: {
                  left: 'timeGridDay',
                  center: 'title',
                  right: 'listDay'
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


              initialView: "listDay", // initial view  =   l view li kayban  mni kan7ol l  calendar
              slotMinTime: "09:00:00", // min  time  appear in the calendar
              slotMaxTime: "19:00:00", // max  time  appear in the calendar
              nowIndicator: true, //  indicator  li kaybyen  l wa9t daba   fin  fl calendar
              selectable: false, //   kankhali l user  i9ad  i selectioner  wast l calendar
              selectMirror: true, //  overlay   that show  the selected area  ( details  ... )
              selectOverlap: false, //  nkhali ktar mn event f  nfs  l wa9t  = e.g:   5 nas i reserviw nfs lblasa  f nfs l wa9t
              weekends: true, // n7ayed  l weekends    ola nkhalihom 


              // events  hya  property dyal full calendar
              //  kat9bel array dyal objects  khass  i kono jayin 3la chkl  object fih  start  o end  7it hya li kayfahloha
              events: sessions,

              // selectAllow: (info) => {

              //     return info.start >= nowDate;
              // },

              // select: (info) => {


              //     if (info.end.getDate() - info.start.getDate() > 0 && !info.allDay) {
              //         return
              //     }

              //     console.log(info);
              //     if (info.allDay) {
              //         start.value = info.startStr + " 09:00:00"
              //         end.value = info.startStr + " 19:00:00"

              //     } else {
              //         start.value = info.startStr.slice(0, info.startStr.length - 6)
              //         end.value = info.endStr.slice(0, info.endStr.length - 6)
              //     }

              //     openSessionForm.click()
              // },
              // eventClick: (info) => {

              //     let sessionId = info.event._def.publicId
              //     if (validateOwner(info)) {
              //         openSession.click();
              //         sessionName.textContent = "Update or Delete Your Session"
              //         deleteSessionForm.action = `/session/destroy/${sessionId}`
              //         updateLink.href = `/session/edit/${sessionId}`
              //     }

              // },






          });

          calendar.render();


      })
  </script>
@endsection


  
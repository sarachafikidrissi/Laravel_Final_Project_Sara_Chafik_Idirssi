<div class="w-full h-full bg-white rounded-3xl border-none p-3" id="planing"></div>

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


        var myCalendar = document.getElementById('planing');


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
            selectable: false, //   kankhali l user  i9ad  i selectioner  wast l calendar
            selectMirror: true, //  overlay   that show  the selected area  ( details  ... )
            selectOverlap: false, //  nkhali ktar mn event f  nfs  l wa9t  = e.g:   5 nas i reserviw nfs lblasa  f nfs l wa9t
            weekends: true, // n7ayed  l weekends    ola nkhalihom 


            // events  hya  property dyal full calendar
            //  kat9bel array dyal objects  khass  i kono jayin 3la chkl  object fih  start  o end  7it hya li kayfahloha
            events: upcomingEvents,


            selectAllow: (info) => {
                return info.start >= nowDate;
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
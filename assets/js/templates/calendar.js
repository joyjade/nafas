document.addEventListener('DOMContentLoaded', function () {
  // helloWorld();
  
  // const apikey = <?= json_encode(env('GOOGLE_API_KEY')) ?>;
  // const calid = <?= json_encode(env('GOOGLE_CAL_ID')) ?>;
  // var calendarEl = document.getElementById('calendar');

  // var calendar = new FullCalendar.Calendar(calendarEl, {
  //   plugins: [ FullCalendarDayGrid, FullCalendarGoogleCalendar ],
  //   initialView: 'dayGridMonth',

  //   googleCalendarApiKey: apikey,  // Replace this

  //   events: {
  //     googleCalendarId: calid
  //   }
  // });

  // calendar.render();
});

function helloWorld(){
  document.onclick = function(e) {
    e.preventDefault;
    alert('Hello World');
  }
}

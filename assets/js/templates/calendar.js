// var calendar = new FullCalendar.Calendar(calendarEl, {
//   plugins: [ 'dayGrid', 'googleCalendar' ],
//   initialView: 'dayGridMonth',
//   googleCalendarApiKey: 'YOUR_API_KEY_HERE',
//   events: {
//     googleCalendarId: 'your_calendar_id@group.calendar.google.com'
//   }
// });

document.addEventListener('DOMContentLoaded', function () {
    // helloWorld();

  // var calendarEl = document.getElementById('calendar');

  // var calendar = new FullCalendar.Calendar(calendarEl, {
  //   plugins: [ FullCalendarDayGrid, FullCalendarGoogleCalendar ],
  //   initialView: 'dayGridMonth',

  //   googleCalendarApiKey: 'AIzaSyBqWKPH9ql7a0cZezwPT3sk5J-HBcaUdnk',  // Replace this

  //   events: {
  //     googleCalendarId: '77tv948plsl94dj18n90pub6as@group.calendar.google.com'         // Replace this
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

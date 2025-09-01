<?php snippet('nav', slots: true) ?>
  <?php slot('script') ?>
    <?= js(['https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js']) ?>
    <?= js('https://cdn.jsdelivr.net/npm/@fullcalendar/google-calendar@6.1.8/index.global.min.js') ?>

    <script>
      let isMobile = window.matchMedia("(max-width:768px)").matches;
      console.log('mobile el', isMobile);

      document.addEventListener('DOMContentLoaded', function () {
        const apikey = <?= json_encode(env('GOOGLE_API_KEY')) ?>;

        const calendarEl = document.getElementById('calendar');

        const calendar = new FullCalendar.Calendar(calendarEl, {
          
          // height: isMobile ? '100%' : auto,
          // aspectRatio: 3,
          // contentHeight: 900,
          initialView: 'multiMonthYear',
          multiMonthMaxColumns: 1,
          googleCalendarApiKey: apikey,
          eventSources: [
            {
              url: '/api', // Your Kirby events
              method: 'GET',
              failure: function () {
                alert('There was an error while fetching Kirby events!');
              },
              color: '#283337',   // optional color for Kirby events
            },
            {
              googleCalendarId: '77tv948plsl94dj18n90pub6as@group.calendar.google.com',
              className: 'gcal-event',
              color: '#4A4F3C' // optional
            }
          ]
        });

        calendar.render();

        // let ar = isMobile ? 2 : 0.8;
        // console.log(ar);
        // calendar.setOption('aspectRatio', ar);
      });


    </script>
  <?php endslot() ?>
<?php endsnippet() ?>

<main class="">
  <h3><?= $page->description() ?></h3>
  <div class="legend">
    <ul>
      <li>
        <span class="dot" style="background-color: #4A4F3C"></span>
        Residency in Progress
      </li>
      <li>
        <span class="dot" style="background-color: #283337"></span>
        Event
      </li>
    </ul>
  </div>
  <div id="calendar"></div>

      </main>
<?php snippet('footer') ?>

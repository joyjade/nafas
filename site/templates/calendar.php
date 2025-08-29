<!DOCTYPE html>
<html lang="en">

<head>
	<title><?= $site->title()?> | <?= $page->title() ?></title>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>*</text></svg>">
  <?= css(
    [
      'assets/css/global.css', 
      'assets/type/fonts.css', 
      'assets/css/mobile.css', 
      '@auto',
    ]) ?>

  <?= js(['https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js']) ?>
  <?= js('https://cdn.jsdelivr.net/npm/@fullcalendar/google-calendar@6.1.8/index.global.min.js') ?>


  <script>
  document.addEventListener('DOMContentLoaded', function () {
    const apikey = <?= json_encode(env('GOOGLE_API_KEY')) ?>;

    const calendarEl = document.getElementById('calendar');

    const calendar = new FullCalendar.Calendar(calendarEl, {
      // height: '100%',
      initialView: 'multiMonthYear',
      multiMonthMaxColumns: 1,
      googleCalendarApiKey: apikey,
      events: {
        googleCalendarId: '77tv948plsl94dj18n90pub6as@group.calendar.google.com'
      }
    });

    calendar.render();
  });
</script>

</head>

<body class="">
  <div class="header">
    <div class="title">
      <a href="<?= $site->url() ?>"><?= $site->title() ?></a>
    </div>
  </div>

	<nav>
    <div class="hamb">
      <!-- <label for="side-menu"> -->
        <div class="hamb-line"></div>
    </div>
    <ul class="m-nav">
      <?php foreach ($site->children()->listed() as $item): ?>
        <li>
          <a <?php e($item->isActive(), 'class="active"') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a>
        </li>
      <?php endforeach ?>
    </ul>
</nav>

<div class="">
  <h3><?= $page->description() ?></h3>
  <div class="legend">
    <ul>
      <li>
        <span class="dot" style="background-color:<?= $page->color() ?>"></span>
        Residency in Progress
      </li>
      <li>
        <span class="dot"></span>
        Event
      </li>
    </ul>
  </div>
  <div id="calendar"></div>

</div>
<?php snippet('footer') ?>

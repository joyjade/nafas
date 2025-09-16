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
      'assets/css/responsive.css', 
      'assets/css/lightbox.css',
      '@auto',
    ]) ?>

  <?php if ($script = $slots->script()): ?>
    <?= $script ?>
  <?php endif ?>

</head>

<body class="<?= $page->template() ?>">
  <div class="header">
    <div class="title">
      <a href="<?= $site->url() ?>"><?= $site->title() ?>  <span class="fa">نفس</span></a>
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
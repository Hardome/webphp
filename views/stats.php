<?php

$fileContent = file_get_contents('counter.txt');
$counters = json_decode($fileContent, true);

$CTR = [];
$CTI = [];
$CTB = [];

for ($i = 1; $i <= 5; $i++) {
  $CTR[$i] = round($counters['bannerAction'][$i] / $counters['bannerViews'][$i], 2) * 100;
  $CTI[$i] = round($counters['bannerAction'][$i] / ($counters['pagesViewsFromBanner'][$i] ?? 0), 3);
  $CTB[$i] = round($counters['actions'][$i] / $counters['bannerAction'][$i], 3);
}

//$CTI[$i] = round($counters['bannerAction'][$i] / (array_sum($counters['pagesViews']) + array_sum($counters['pagesViewsFromBanner'])), 3);
//bannerViews - просмотры баннера
//pagesViewsFromBanner - зашли на страницу по баннеру
//actions - нажали заказать по ссылке через баннер
//pagesViews - обычные просмотры страницы (не через баннер)
//bannerAction - нажатие на баннер

// ctr - нажали на gif / показали gif +
// cti - нажали на gif / переход на страницу
// ctb - нажали заказать (только с баннера)/ нажали на gif
?>

<link rel='stylesheet' href='styles.css'>
<div class="links">
  <a href="/randomBanner">Рандомные баннера</a>
</div>

<?php for ($i = 1; $i <= 5; $i++) { ?>
  <div> CTR <?= $i ?>: <?= $CTR[$i] ?>%</div>
  <div> CTI <?= $i ?>: <?= $CTI[$i] ?></div>
  <div> CTB <?= $i ?>: <?= $CTB[$i] ?></div>
  <hr>
<?php } ?>
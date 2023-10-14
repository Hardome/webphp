<?php

$fileContent = file_get_contents('counter.txt');
$counters = json_decode($fileContent, true);

$CTR = [];
$CTI = [];
$CTB = [];

for ($i = 1; $i <= 5; $i++) {
    $CTR[$i] = round($counters['pagesViews'][$i] / $counters['bannerViews'][$i], 2) * 100;
    $CTI[$i] = round($counters['pagesViews'][$i] / array_sum($counters['bannerViews']), 2);
    $CTB[$i] = round($counters['actions'][$i] / $counters['pagesViews'][$i], 2);
}
?>


<link rel='stylesheet' href='styles.css'>
<div class="links">
  <a href="/randomBanner">Рандомные баннера</a>
</div>

<?php for ($i = 1; $i <= 5; $i++) { ?>
  <div> CTR  <?=$i?>: <?= $CTR[$i]?>%</div>
  <div> CTI <?=$i?>: <?= $CTI[$i]?></div>
  <div> CTB <?=$i?>: <?= $CTB[$i]?></div>
  <hr>
<?php } ?>
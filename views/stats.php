<?php
$fileContent = file_get_contents('counter.txt');
$counters = json_decode($fileContent, true);
//echo $fileContent;

$firstCTR = round($counters['pagesViews']['first'] / $counters['bannerViews']['1'], 2) * 100;
$secondCTR = round($counters['pagesViews']['second'] / $counters['bannerViews']['2'], 2) * 100;
$thirdCTR = round($counters['pagesViews']['third'] / $counters['bannerViews']['3'], 2) * 100;
$fourthCTR = round($counters['pagesViews']['fourth'] / $counters['bannerViews']['4'], 2) * 100;
$fifthCTR = round($counters['pagesViews']['fifth'] / $counters['bannerViews']['5'], 2) * 100;

$allViews = $counters['bannerViews']['1'] + $counters['bannerViews']['2'] + 
  $counters['bannerViews']['3'] + $counters['bannerViews']['4'] + $counters['bannerViews']['5'];

$firstCTI = round($counters['pagesViews']['first'] / $allViews, 2);
$secondCTI = round($counters['pagesViews']['second'] / $allViews, 2);
$thirdCTI = round($counters['pagesViews']['third'] / $allViews, 2);
$fourthCTI = round($counters['pagesViews']['fourth'] / $allViews, 2);
$fifthCTI = round($counters['pagesViews']['fifth'] / $allViews, 2);

$firstCTB= $counters['actions']['first'] / $counters['pagesViews']['first'];
$secondCTB = $counters['actions']['second'] / $counters['pagesViews']['second'];
$thirdCTB = $counters['actions']['third'] / $counters['pagesViews']['third'];
$fourthCTB = $counters['actions']['fourth'] / $counters['pagesViews']['fourth'];
$fifthCTB = $counters['actions']['fifth'] / $counters['pagesViews']['fifth'];

?>


<link rel='stylesheet' href='views/styles.css'>
<div class="link">
  <a href="/randomBanner">Рандомные баннера</a>
  <a href="/stats">Статистика</a>
</div>

<div>CTR первого баннера: <?= $firstCTR ?>%</div>
<div>CTR второго баннера: <?= $secondCTR ?>%</div>
<div>CTR третьего баннера: <?= $thirdCTR ?>%</div>
<div>CTR четвертого баннера: <?= $fourthCTR ?>%</div>
<div>CTR пятого баннера: <?= $fifthCTR ?>%</div>
<hr>
<div>CTR первого баннера: <?= $firstCTI ?></div>
<div>CTR второго баннера: <?= $secondCTI ?></div>
<div>CTR третьего баннера: <?= $thirdCTI ?></div>
<div>CTR четвертого баннера: <?= $fourthCTI ?></div>
<div>CTR пятого баннера: <?= $fifthCTI ?></div>
<hr>
<div>CTR первого баннера: <?= $firstCTB ?></div>
<div>CTR второго баннера: <?= $secondCTB ?></div>
<div>CTR третьего баннера: <?= $thirdCTB ?></div>
<div>CTR четвертого баннера: <?= $fourthCTB ?></div>
<div>CTR пятого баннера: <?= $fifthCTB ?></div>
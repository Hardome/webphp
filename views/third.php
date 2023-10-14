<?php
$fileContent = file_get_contents('../counter.txt');
$counters = json_decode($fileContent, true);

if (isset($counters['pagesViews']['third'])) {
	$counters['pagesViews']['third']++;
} else {
	$counters['pagesViews']['third'] = 1;
}

$fileData = json_encode($counters);
file_put_contents('../counter.txt', $fileData);

$fileContent = file_get_contents('../txt/Third.txt');

$convertedString = iconv('WINDOWS-1251', 'UTF-8', $fileContent);
?>

<link rel='stylesheet' href='views/styles.css'>
<div class="link">
  <a href="/randomBanner">Рандомные баннера</a>
  <a href="/stats">Статистика</a>
</div>

<form action="../actions/upPageActions.php" method="POST">
	<br>
	<input type="hidden" value="third" name="page">
	<input type="submit" name="submit" value="Заказать">
	<br>
</form>

<div><?= $fileContent ?></div>
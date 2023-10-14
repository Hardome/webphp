<?php
$fileContent = file_get_contents('./counter.txt');
$counters = json_decode($fileContent, true);

$fromBanner =  $_GET['fromBanner'] ?? '';

if (isset($counters['pagesViews']['5'])) {
	$counters['pagesViews']['5']++;
} else {
	$counters['pagesViews']['5'] = 1;
}

$fileData = json_encode($counters);
file_put_contents('./counter.txt', $fileData);

$lines = file('./txt/Fifth.txt');
?>


<link rel='stylesheet' href='styles.css'>
<div class="links">
  <a href="/randomBanner">Рандомные баннера</a>
  <a href="/stats">Статистика</a>
</div>

<form action="../actions/upPageActions.php" method="POST">
	<br>
	<input type="hidden" value="5" name="page">
	<input type="hidden" value="<?= $fromBanner ?>" name="fromBanner">
	<input type="submit" name="submit" value="Заказать">
	<br>
</form>

<?php foreach ($lines as $line) { ?>
	<div class="div"><?= $line ?></div>
<?php } ?>
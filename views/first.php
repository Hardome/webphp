<?php
$fileContent = file_get_contents('./counter.txt');
$counters = json_decode($fileContent, true);

$submit =  $_GET['submit'] ?? null;
$fromBanner =  $_GET['fromBanner'] ?? null;
$page = 1;

if (!isset($submit)) {
	if (isset($fromBanner)) {
		//просмотры с баннера
		if (isset($counters['pagesViewsFromBanner'][$page])) {
			$counters['pagesViewsFromBanner'][$page]++;
		} else {
			$counters['pagesViewsFromBanner'][$page] = 1;
		}
	} else {
		//обычные просмотры страницы
		if (isset($counters['pagesViews'][$page])) {
			$counters['pagesViews'][$page]++;
		} else {
			$counters['pagesViews'][$page] = 1;
		}
	}
}

$fileData = json_encode($counters);
file_put_contents('./counter.txt', $fileData);

$lines = file('./txt/First.txt');
?>

<link rel='stylesheet' href='styles.css'>
<div class="links">
  <a href="/randomBanner">Рандомные баннера</a>
  <a href="/stats">Статистика</a>
</div>

<form action="../actions/upPageActions.php" method="POST">
	<br>
	<input type="hidden" value="1" name="page">
	<input type="hidden" value="<?= $fromBanner ?>" name="fromBanner">
	<input type="submit" name="submit" value="Заказать">
	<br>
</form>

<?php foreach ($lines as $line) { ?>
	<div class="div"><?= $line ?></div>
<?php } ?>
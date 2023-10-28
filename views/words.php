<?php
  $counterContent = file_get_contents('./counter.txt');
  $counter = json_decode($counterContent, true);

  $wordsContent = file_get_contents('words.txt');
  $wordsJson = json_decode($wordsContent, true);
  $words = $wordsJson['words'];
  $views = $counter['views'];

  arsort($views); //сортируем по значениям с сохраненем ключей

  $maxOpeningCount = max(array_values($views));
  $minFontSize = 10;
  $maxFontSize = 60;
?>

<link rel='stylesheet' href='../views/styles.css'>
<div class="links">
	<a href="view/?page=">Страница</a>
</div>

<?php foreach ($views as $view => $openingCount) { ?>
  <?php $fontSize = round(($openingCount / $maxOpeningCount) * ($maxFontSize - $minFontSize) + $minFontSize) ?>
  <a href="view/?page=<?=$view?>"><div style="font-size: <?=$fontSize ?>px;"> <?= implode(' ', $words[$view]) ?> </div></a>
<?php } ?>
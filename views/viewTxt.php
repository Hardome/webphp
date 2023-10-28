<?php

$pageNumber = $_GET['page'];

$pages = [
  '1' => './txt/1.txt',
  '2' => './txt/2.txt',
  '3' => './txt/3.txt',
  '4' => './txt/4.txt',
  '5' => './txt/5.txt',
  '6' => './txt/6.txt',
  '7' => './txt/7.txt',
  '8' => './txt/8.txt',
  '9' => './txt/9.txt',
  '10' => './txt/10.txt'
];

if($pageNumber) {
  $lines = file($pages[$pageNumber]);
  $correctEncode = [];

  //логгер
  $fileContent = file_get_contents('./counter.txt');
  $counters = json_decode($fileContent, true);

  if (isset($counters['views'][$pageNumber])) {
    $counters['views'][$pageNumber]++;
  } else {
    $counters['views'][$pageNumber] = 1;
  }

  $fileData = json_encode($counters);
  file_put_contents('./counter.txt', $fileData);

  //перекодировка
  foreach ($lines as $line) {
    $correctEncode[] = iconv('Windows-1251', 'UTF-8', $line);
  }
} else {
	echo 'Ведите в поисковой строке номер страницы (1-10)';
}
?>

<link rel='stylesheet' href='../views/styles.css'>
<div class="links">
	<a href="../words">Слова</a>
</div>

<?php if (strlen($pageNumber) > 0) { ?>
  <?php foreach ($correctEncode as $line) { ?>
    <div class="resident">
        <?= $line ?>
    </div>
  <?php } ?>
<?php } ?>
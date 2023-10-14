<?php
$number = random_int(1, 5);

$fileContent = file_get_contents('counter.txt');
$counters = json_decode($fileContent, true);

if (isset($counters['bannerViews'][$number])) {
  $counters['bannerViews'][$number]++;
} else {
  $counters['bannerViews'][$number] = 1;
}

$fileData = json_encode($counters);
file_put_contents('counter.txt', $fileData);

$banners = [
  '1' => '../banners/01.gif',
  '2' => '../banners/02.gif',
  '3' => '../banners/03.gif',
  '4' => '../banners/04.gif',
  '5' => '../banners/05.gif'
];

$pages = [
  '1' => './views/first.php',
  '2' => './views/second.php',
  '3' => './views/third.php',
  '4' => './views/fourth.php',
  '5' => './views/fifth.php'
];

$bannerPath =  $banners[$number];
$pagePath =  $pages[$number];
?>

<link rel='stylesheet' href='views/styles.css'>
<div class="link">
  <a href="/stats">Статистика</a>
  <a href=<?php echo $pagePath ?>>
    <img src=<?php echo $bannerPath ?> alt="" />
  </a>
</div>


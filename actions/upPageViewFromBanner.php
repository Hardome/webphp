<?php
$page =  $_GET['page'];
$pages = [
  '1' => 'first',
  '2' => 'second',
  '3' => 'third',
  '4' => 'fourth',
  '5' => 'fifth'
];

$fileContent = file_get_contents('../counter.txt');
$counters = json_decode($fileContent, true);

if (isset($counters['pagesViewsByBanner'][$page])) {
  $counters['pagesViewsByBanner'][$page]++;
} else {
  $counters['pagesViewsByBanner'][$page] = 1;
}
$fileData = json_encode($counters);
file_put_contents('../counter.txt', $fileData);

header('Location: ../' . $pages[$page] . '/?fromBanner=true');

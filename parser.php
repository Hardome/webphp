<?php

$fileContents = file_get_contents('./html.htm');

if ($fileContents !== false) {
  echo $fileContents;
}

$regex = '/<!-- Header Menu -->(.*?)<!--End of Header Menu-->/s';


if (preg_match($regex, $html, $matches)) {
  $tableHtml = $matches[1];

  $cellRegex = '/<td[^>]*>(.*?)<\/td>/';

  if (preg_match_all($cellRegex, $tableHtml, $cellMatches)) {
    $cells = array_map(function ($match) {
      $cellContent = preg_replace('/<\/?[^>]+(>|$)/', '', $match); // Удаляем теги из ячеек
      return trim($cellContent); // Обрезаем пробелы по краям строки
    }, $cellMatches[1]);

    print_r($cells);
  } else {
    echo 'Ячейки не найдены!';
  }
} else {
  echo 'Блок Header Menu не найден!';
}

?>
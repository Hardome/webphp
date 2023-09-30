<?php
$fileContent = file_get_contents('./html.htm');
$regex = '/<!-- Header Menu -->(.*?)<!--End of Header Menu-->/s';

// удалось ли прочитать файл
if ($fileContent !== false) {

	if (preg_match($regex, $fileContent, $matches)) {
		$extractedContent = $matches[0];

		$cellRegex = '/<a[^>]*>(.*?)<\/a>/';

		if (preg_match_all($cellRegex, $extractedContent, $matches)) {
			$extractedContent2 = $matches[1];

			$mergedContent = implode("\n", $extractedContent2); //джоин в строку

			$cleanedStr = preg_replace('/&nbsp;/', '', $mergedContent); //очищаю от nbsp

			$convertedString = iconv('Windows-1251', 'UTF-8', $cleanedStr); //меняю кодировку строки

			$letterRegex = '/\bУ\w+/u';
			preg_match_all($letterRegex, $convertedString, $matches);
			$wordCount = count($matches[0]);

			$strToFile = $cleanedStr . "\n" . $wordCount;
			
			file_put_contents("text.txt", $strToFile); // Запись в файл
		} else {
			echo 'Контент не найден во второй регулярке';
		}
	} else {
		echo 'Контент не найден в первой регулярке';
	}
} else {
	echo 'Ошибка чтения файла';
}
?>

<p><?=$extractedContent?></p>
<p><?=$cleanedStr?></p>
<p><?=$convertedString?></p>
<p>Количество слов, начинающихся на У:<?=$wordCount?></p>
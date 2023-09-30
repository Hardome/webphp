<?php
$fileContent = file_get_contents('./html.htm');
$regex = '/<!-- Header Menu -->(.*?)<!--End of Header Menu-->/s';

// Проверка, удалось ли прочитать файл
if ($fileContent !== false) {

	if (preg_match($regex, $fileContent, $matches)) {
		$extractedContent = $matches[0];
		echo $extractedContent;

		$cellRegex = '/<a[^>]*>(.*?)<\/a>/';

		if (preg_match_all($cellRegex, $extractedContent, $matches)) {
			$extractedContent2 = $matches[1];
		//	echo $extractedContent2;

			$mergedContent = implode("\n", $extractedContent2);

			$cleanedStr = preg_replace('/&nbsp;/', '', $mergedContent);
			echo $cleanedStr;

			$convertedString = iconv('UTF-8', 'Windows-1252', $cleanedStr);
			//$convertedString = mb_convert_encoding('UTF-8', 'Windows-1252', $cleanedStr);
			echo $convertedString;

			$regex = '/\bУ\w+/u';
			preg_match_all($regex, $cleanedStr, $matches);
			$wordCount = count($matches[0]);
			
			echo "Количество слов, начинающихся на У: " . $wordCount;

			$file = 'text.txt';

			// Запись совпадений в файл
			file_put_contents($file, $cleanedStr);
		} else {
			echo 'Контент не найден. 2';
		}
	} else {
		echo 'Контент не найден.';
	}
} else {
	echo 'Ошибка чтения файла.';
}
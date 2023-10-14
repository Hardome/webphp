<?php

if (isset($_POST['page'])) {
	$fileContent = file_get_contents('../counter.txt');
	$page = $_POST['page'];

			$counters = json_decode($fileContent, true); // Преобразование данных в ассоциативный массив
			
			// Изменение значения счетчика
			if (isset($counters['actions'][$page])) {
					$counters['actions'][$page]++;
			} else {
					$counters['actions'][$page] = 1;
			}
			
			// Сохранение данных счетчика в файл
			$fileData = json_encode($counters);
			file_put_contents('../counter.txt', $fileData);

			$routes = [
				// '/' => 'index.php',
				 '1' => './views/first.php',
				 '2' => './views/second.php',
				 '3' => './views/third.php',
				 '4' => './views/fourth.php',
				 '5' => './views/fifth.php'
			];

			header('Location: ../' . $routes[$page]);
}

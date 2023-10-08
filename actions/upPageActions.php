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

			header('Location: ../views/' . $page . '.php');
}

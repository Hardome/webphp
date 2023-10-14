<?php

if (isset($_POST['page'])) {
	$fileContent = file_get_contents('../counter.txt');
	$page = $_POST['page'];
	$fromBanner = $_POST['fromBanner'] ?? 'false';
	
	if ($fromBanner === 'true') {

		$counters = json_decode($fileContent, true);

		if (isset($counters['actions'][$page])) {
			$counters['actions'][$page]++;
		} else {
			$counters['actions'][$page] = 1;
		}

		$fileData = json_encode($counters);
		file_put_contents('../counter.txt', $fileData);
	}

	$routes = [
		// '/' => 'index.php',
		'1' => 'first',
		'2' => 'second',
		'3' => 'third',
		'4' => 'fourth',
		'5' => 'fifth'
	];

	if ($fromBanner === 'true'){
		header('Location: ../' . $routes[$page] . '/?fromBanner=' . $fromBanner);
	}
	else {
		header('Location: ../' . $routes[$page]);
	}
}

<?php

$routes = [
	// '/' => 'index.php',
	'main' => './views/main.php'
];

$url_array = explode('/', $_SERVER['REQUEST_URI']);

$entity = $url_array[1] ?? '';

if ($url_array[1] == "") {
  include 'index.php';
} else {
	include $routes[$entity];
}
?>

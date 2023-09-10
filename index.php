<?php
include 'config.php';

// Определение маршрутов
$routes = [
	// '/' => 'index.php',
	 'clients' => 'clients.php',
	 'objects' => 'objects.php',
	 'rents' => 'rents.php',
	 'update' => 'update.php',
	 'queries' => 'queries.php'
];

$url_array = explode('/', $_SERVER['REQUEST_URI']);

$entity = $url_array[1] ?? '';
$action = $url_array[2] ?? '';

if ($url_array[1] == "") {
  include 'index.php';
} else {
	include $routes[$entity];
}
?>

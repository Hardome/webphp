<?php
include 'config.php';

// Определение маршрутов
$routes = [
	// '/' => 'index.php',
	 'clients' => './views/clients.php',
	 'objects' => './views/objects.php',
	 'rents' => './views/rents.php',
	 'update' => './views/update.php'
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

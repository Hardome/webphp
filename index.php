<?php

$routes = [
	// '/' => 'index.php',
	 'first' => './views/first.php',
	 'second' => './views/second.php',
	 'third' => './views/third.php',
	 'fourth' => './views/fourth.php',
	 'fifth' => './views/fifth.php',
	 'randomBanner' => './views/randomBanner.php',
	 'stats' => './views/stats.php'
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

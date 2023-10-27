<?php

$routes = [
	// '/' => 'index.php',
	 'parse' => './views/parse.php',
	//  'second' => './views/second.php',
	//  'third' => './views/third.php',
	//  'fourth' => './views/fourth.php',
	//  'fifth' => './views/fifth.php',
	//  'randomBanner' => './views/randomBanner.php',
	//  'stats' => './views/stats.php',
	//  'upPageActions' => './actions/upPageActions.php',
	//  'upPVFB' => './actions/upPageViewFromBanner.php'
];

$url_array = explode('/', $_SERVER['REQUEST_URI']);

$entity = $url_array[1] ?? '';

if ($url_array[1] == "") {
  include 'index.php';
} else {
	include $routes[$entity];
}
?>

<?php
  include 'config.php';
  $conn = new mysqli($servername, $username, $password, $dbname);

  $type = $_GET['type'];
  $mark = $_GET['mark'];
  $distance = $_GET['distance'];

  $costSQL = "SELECT cost from cars WHERE type = '$type' and mark = '$mark'";

  $costResult = mysqli_query($conn, $costSQL);

  $cost = mysqli_fetch_array($costResult);

  echo ($cost['cost'] * $distance) / 100.
?>
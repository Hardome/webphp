<?php
  include 'config.php';
  $conn = new mysqli($servername, $username, $password, $dbname);

  $type = $_GET['type'];

  $marksSQL = "SELECT mark from cars WHERE type = '$type'";

  $marks = mysqli_query($conn, $marksSQL);


  foreach ($marks as $mark) {
    echo '<option value="' . $mark['mark'] . '">' . $mark['mark'] . '</option>';
  }
?>
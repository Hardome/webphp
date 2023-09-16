<?php
include '../config.php';
$conn = new mysqli($servername, $username, $password, $dbname);


if (isset($_POST['type'])) {
  $type = $_POST['type'];
  $ten = "UPDATE objects SET price = price * 1.12 WHERE type = ('$type')";
  
  echo $ten;
  $tenRes = mysqli_query($conn, $ten);
}

?>

<br>
<a href="../queries">Назад</a>

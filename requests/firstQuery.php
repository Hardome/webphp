<?php
include '../config.php';
$conn = new mysqli($servername, $username, $password, $dbname);


if (isset($_POST['type'])) {
  $type = $_POST['type'];
  $first = "select * from objects WHERE type = ('$type') order by price asc";

  echo $first;
  $firstRes = mysqli_query($conn, $first);
}

?>
<br>
<a href="../queries">Назад</a>
<table border="black">
  <tr>
    <td>id</td>
    <td>type</td>
    <td>price</td>
  </tr>
  <?php foreach ($firstRes as $value) { ?>
    <tr>
      <td><?= $value['id'] ?></td>
      <td><?= $value['type'] ?></td>
      <td><?= $value['price'] ?></td>
    </tr>
  <?php } ?>
</table>
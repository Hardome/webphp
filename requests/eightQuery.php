<?php
include '../config.php';
$conn = new mysqli($servername, $username, $password, $dbname);


if (isset($_POST['quarter']) && isset($_POST['year'])) {
  $quarter = $_POST['quarter'];
  $year = $_POST['year'];
  $eighth = "select objects.id as id, objects.type as type, objects.price as price, rents.dateRent
  FROM objects
  JOIN rents ON rents.objectId = objects.id
  WHERE QUARTER(rents.dateRent) = $quarter AND YEAR(rents.dateRent) = YEAR('$year')
  ORDER BY rents.dateRent ASC";
  
  echo $eighth;
  $eighthRes = mysqli_query($conn, $eighth);
}

?>
<br>
<a href="../queries">Назад</a>
<table  border="black">
  <tr>
    <td>id</td>
    <td>type</td>
    <td>price</td>
    <td>dateRent</td>
  </tr>
  <?php foreach ($eighthRes as $value) { ?>
    <tr>
      <td><?= $value['id'] ?></td>
      <td><?= $value['type'] ?></td>
      <td><?= $value['price'] ?></td>
      <td><?= $value['dateRent'] ?></td>
    </tr>
  <?php } ?>
</table>
<?php
include '../config.php';
$conn = new mysqli($servername, $username, $password, $dbname);


if (isset($_POST['count'])) {
  $count = $_POST['count'];
  $second = "select  a.id, a.lastName
	from(

			SELECT clients.id as id, clients.lastName as lastName, COUNT(rents.id) as times
			FROM clients
			JOIN rents ON rents.clientId = clients.id
			GROUP BY clients.id
	) as a
	where a.times = ('$count')";
  
  echo $second;
  $secondRes = mysqli_query($conn, $second);
}

?>
<br>
<a href="../queries">Назад</a>
<table border="black">
  <tr>
    <td>id</td>
    <td>lastName</td>
  </tr>
  <?php foreach ($secondRes as $value) { ?>
    <tr>
      <td><?= $value['id'] ?></td>
      <td><?= $value['lastName'] ?></td>
    </tr>
  <?php } ?>
</table>
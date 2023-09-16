<?php
include 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);
?>

<a href="objects">🏠Объекты</a>
<a href="rents">🗎Аренды</a>

<?php
$third = "select  a.id, a.type, a.price
from(

		SELECT objects.id as id, objects.type as type, objects.price as price, COUNT(rents.id) as times
		FROM objects
		LEFT JOIN rents ON rents.objectId = objects.id
		GROUP BY objects.id
) as a
where a.times = 0";

$fourth = "select  a.id, a.type, a.price
from(

		SELECT objects.id as id, objects.type as type, objects.price as price, COUNT(rents.id) as times
		FROM objects
		LEFT JOIN rents ON rents.objectId = objects.id
		GROUP BY objects.id
) as a
where a.times > 3";

$fifth = "select  a.id, a.type, a.price, a.times
from(
			SELECT objects.id as id, objects.type as type, objects.price as price, COUNT(rents.id) as times
			FROM objects
			JOIN rents ON rents.objectId = objects.id
			WHERE rents.rentDuration > 12
			GROUP BY objects.id, rents.objectId
) as a
where a.times > 2";

$six = "select objects.id as id, objects.type as type, objects.price as price, COUNT(rents.id) as times, SUM(objects.price) as summ
FROM objects
JOIN rents ON rents.objectId = objects.id
GROUP BY objects.id, rents.objectId";

$seven = "select clients.id as id, clients.lastName as lastName, SUM(rents.rentDuration)/COUNT(rents.id) AS average, COUNT(rents.id) as count, SUM(rents.rentDuration) as sumDuration
FROM clients
JOIN rents ON rents.clientId = clients.id
GROUP BY clients.id";

$nine = "select clients.id as id, clients.lastName as lastName, count(rents.objectId) as objectsCount
FROM clients
JOIN rents ON rents.clientId = clients.id
GROUP BY clients.id";

$thirdRes = mysqli_query($conn, $third);
$fourthRes = mysqli_query($conn, $fourth);
$fifthRes = mysqli_query($conn, $fifth);
$sixRes = mysqli_query($conn, $six);
$sevenRes = mysqli_query($conn, $seven);
$nineRes = mysqli_query($conn, $nine);

$sqlObjects = "SELECT * FROM objects";
$objects = mysqli_query($conn, $sqlObjects);
?>

<div>Запрос 1</div>
<form action="../requests/firstQuery.php" method="POST">
	<br>
	<select name="type">
		<option value="" selected disabled hidden>тип объекта</option>
		<?php foreach ($objects as $value) { ?>
			<option value="<?= $value['type'] ?>"><?= $value['type'] ?></option>
		<?php } ?>
	</select>
	<input type="submit" name="submit" value="Выполнить">
	<br>
</form>

<div>Запрос 2</div>
<form action="../requests/secondQuery.php" method="POST">
	<br>
  <input type="number" name="count" placeholder="Количество">
	<input type="submit" name="submit" value="Выполнить">
	<br>
</form>

<div>Запрос 3</div>
<table  border="black">
  <tr>
    <td>id</td>
    <td>type</td>
    <td>price</td>
  </tr>
  <?php foreach ($thirdRes as $value) { ?>
    <tr>
      <td><?= $value['id'] ?></td>
      <td><?= $value['type'] ?></td>
      <td><?= $value['price'] ?></td>
    </tr>
  <?php } ?>
</table>

<div>Запрос 4</div>
<table  border="black">
  <tr>
    <td>id</td>
    <td>type</td>
    <td>price</td>
  </tr>
  <?php foreach ($fourthRes as $value) { ?>
    <tr>
      <td><?= $value['id'] ?></td>
      <td><?= $value['type'] ?></td>
      <td><?= $value['price'] ?></td>
    </tr>
  <?php } ?>
</table>

<div>Запрос 5</div>
<table  border="black">
  <tr>
    <td>id</td>
    <td>type</td>
    <td>price</td>
    <td>times</td>
  </tr>
  <?php foreach ($fifthRes as $value) { ?>
    <tr>
      <td><?= $value['id'] ?></td>
      <td><?= $value['type'] ?></td>
      <td><?= $value['price'] ?></td>
      <td><?= $value['times'] ?></td>
    </tr>
  <?php } ?>
</table>

<div>Запрос 6</div>
<table  border="black">
  <tr>
    <td>id</td>
    <td>type</td>
    <td>price</td>
    <td>times</td>
    <td>summ</td>
  </tr>
  <?php foreach ($sixRes as $value) { ?>
    <tr>
      <td><?= $value['id'] ?></td>
      <td><?= $value['type'] ?></td>
      <td><?= $value['price'] ?></td>
      <td><?= $value['times'] ?></td>
      <td><?= $value['summ'] ?></td>
    </tr>
  <?php } ?>
</table>

<div>Запрос 7</div>
<table  border="black">
  <tr>
    <td>id</td>
    <td>lastName</td>
    <td>average</td>
    <td>count</td>
    <td>sumDuration</td>
  </tr>
  <?php foreach ($sevenRes as $value) { ?>
    <tr>
      <td><?= $value['id'] ?></td>
      <td><?= $value['lastName'] ?></td>
      <td><?= $value['average'] ?></td>
      <td><?= $value['count'] ?></td>
      <td><?= $value['sumDuration'] ?></td>
    </tr>
  <?php } ?>
</table>

<div>Запрос 8</div>
<form action="../requests/eightQuery.php" method="POST">
	<br>
  <label for="quarter">Квартал:</label>
	<input type="number" name="quarter">
  <input type="date" name="year">
	<input type="submit" name="submit" value="Выполнить">
	<br>
</form>

<div>Запрос 9</div>
<table  border="black">
  <tr>
    <td>id</td>
    <td>lastName</td>
    <td>objectsCount</td>
  </tr>
  <?php foreach ($nineRes as $value) { ?>
    <tr>
      <td><?= $value['id'] ?></td>
      <td><?= $value['lastName'] ?></td>
      <td><?= $value['objectsCount'] ?></td>
    </tr>
  <?php } ?>
</table>

<div>Запрос 10</div>

<form action="../requests/tenQuery.php" method="POST">
	<br>
  <select name="type">
		<option value="" selected disabled hidden>тип объекта</option>
		<?php foreach ($objects as $value) { ?>
			<option value="<?= $value['type'] ?>"><?= $value['type'] ?></option>
		<?php } ?>
	</select>
	<input type="submit" name="submit" value="Выполнить">
	<br>
</form>
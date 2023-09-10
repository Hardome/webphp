<?php
include 'config.php';
$conn = new mysqli($servername, $username, $password, $dbname);

$sqlRents = "SELECT rents.id as id, objectId, clientId, dateRent, rentDuration, lastName 
	 	FROM rents join clients on clients.id = rents.clientId order by rents.id";
$rents = mysqli_query($conn, $sqlRents);

$sqlClients = "SELECT * FROM clients";
$сlients = mysqli_query($conn, $sqlClients);

$sqlObjects = "SELECT * FROM objects";
$objects = mysqli_query($conn, $sqlObjects);
?>

<a href="clients">👤Клиенты</a>
<a href="objects">🏠Объекты</a>

<form action="../crud/create.php" method="POST">
	<br>
	<input type="hidden" value="rent" name="entity">
	<select name="objectId">
		<option value="" selected disabled hidden>id объекта</option>
		<?php foreach ($objects as $value) { ?>
			<option value="<?= $value['id'] ?>"><?= $value['id'] ?></option>
		<?php } ?>
	</select>
	<select name="clientId">
		<option value="" selected disabled hidden>Клиент</option>
		<?php foreach ($сlients as $value) { ?>
			<option value="<?= $value['id'] ?>"><?= $value['lastName'] ?></option>
		<?php } ?>
	</select>
	<input type="date" name="dateRent">
	<input type="number" name="rentDuration" placeholder="Количество месяцев">
	<input type="submit" name="submit" value="Добавить">
	<br>
</form>

<table>
	<tr>
		<td>id</td>
		<td>id объекта</td>
		<td>id клиента</td>
		<td>Фамилия клиента</td>
		<td>Дата аренды</td>
		<td>Количество месяцев</td>
	</tr>
	<?php foreach ($rents as $value) { ?>
		<tr>
			<td><?= $value['id'] ?> </td>
			<td><?= $value['objectId'] ?></td>
			<td><?= $value['clientId'] ?></td>
			<td><?= $value['lastName'] ?></td>
			<td><?= $value['dateRent'] ?></td>
			<td><?= $value['rentDuration'] ?></td>
			<td>
				<form action="../views/update.php" method="POST">
					<input type="hidden" value="rent" name="entity">
					<input type="hidden" value="<?= $value['id'] ?>" name="id">
					<input type="submit" name="submit" value="Изменить">
				</form>
			</td>
			<td>
				<form action="../crud/delete.php" method="POST">
					<input type="hidden" value="rent" name="entity">
					<input type="hidden" value="<?= $value['id'] ?>" name="id">
					<input type="submit" name="submit" value="Удалить">
				</form>
			</td>
		</tr>
	<?php } ?>
</table>
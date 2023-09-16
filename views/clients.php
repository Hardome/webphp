<?php
include 'config.php';
$conn = new mysqli($servername, $username, $password, $dbname);

$sqlClients = "SELECT * FROM clients";
$clients = mysqli_query($conn, $sqlClients);
?>

<a href="objects">🏠Объекты</a>
<a href="rents">🗎Аренды</a>
<a href="queries">Запросы</a>


<form action="../crud/create.php" method="POST">
	<br>
	<input type="hidden" value="client" name="entity">
	<label for="id">Фамиллия:</label>
	<input type="text" name="lastName">
	<input type="submit" name="submit" value="Добавить">
	<br>
</form>

<table border="black">
	<tr>
		<td>id</td>
		<td>Фамилия</td>
	</tr>
	<?php foreach ($clients as $value) { ?>
		<tr>
			<td><?= $value['id'] ?> </td>
			<td><?= $value['lastName'] ?></td>
			<td>
				<form action="../views/update.php" method="POST">
					<input type="hidden" value="client" name="entity">
					<input type="hidden" value="<?= $value['id'] ?>" name="id">
					<input type="submit" name="submit" value="Изменить">
				</form>
			</td>
			<td>
				<form action="../crud/delete.php" method="POST">
					<input type="hidden" value="client" name="entity">
					<input type="hidden" value="<?= $value['id'] ?>" name="id">
					<input type="submit" name="submit" value="Удалить">
				</form>
			</td>
		</tr>
	<?php } ?>
</table>
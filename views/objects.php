<?php
include 'config.php';
$conn = new mysqli($servername, $username, $password, $dbname);

$sqlObjects = "SELECT * FROM objects";
$objects = mysqli_query($conn, $sqlObjects);
?>

<a href="clients">👤Клиенты</a>
<a href="rents">🗎Аренды</a>


<form action="../crud/create.php" method="POST">
	<br>
	<input type="hidden" value="object" name="entity">
	<input type="number" name="type" placeholder="Тип">
	<input type="number" name="price" placeholder="Цена">
	<input type="submit" name="submit" value="Добавить">
	<br>
</form>

<table>
	<tr>
		<td>id</td>
		<td>Тип</td>
		<td>Цена</td>
	</tr>
	<?php foreach ($objects as $value) { ?>
		<tr>
			<td><?= $value['id'] ?> </td>
			<td><?= $value['type'] ?></td>
			<td><?= $value['price'] ?></td>
			<td>
				<form action="../views/update.php" method="POST">
					<input type="hidden" value="object" name="entity">
					<input type="hidden" value="<?= $value['id'] ?>" name="id">
					<input type="submit" name="submit" value="Изменить">
				</form>
			</td>
			<td>
				<form action="../crud/delete.php" method="POST">
					<input type="hidden" value="object" name="entity">
					<input type="hidden" value="<?= $value['id'] ?>" name="id">
					<input type="submit" name="submit" value="Удалить">
				</form>
			</td>
		</tr>
	<?php } ?>
</table>
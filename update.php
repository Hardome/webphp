<?php
include './config.php';
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Ошибка подключения: " . $conn->connect_error);
}

if (isset($_POST['entity'])) {
	$entity = $_POST['entity'];

	switch ($entity) {
		case 'client':
			if (isset($_POST['id'])) {
				$id = $_POST['id'];

				$sql = "select * from clients where id = ('$id')";

				$clients = $conn->query($sql);

				foreach ($clients as $value) {
?>
					<form action="../crud/update.php" method="POST">
						<br>
						<input type="hidden" value="client" name="entity">
						<input type="hidden" value="<?= $value['id'] ?>" name="id">
						<label for="id">Фамиллия:</label>
						<input type="text" name="lastName" value="<?= $value['lastName'] ?>">
						<input type="submit" name="submit" value="Сохранить">
						<br>
					</form>
				<?php
				}
			}
			break;

		case 'object':
			if (isset($_POST['id'])) {
				$id = $_POST['id'];

				$sql = "select * from objects where id = ('$id')";

				$objects = $conn->query($sql);

				foreach ($objects as $value) {
				?>
					<form action="../crud/update.php" method="POST">
						<br>
						<input type="hidden" value="object" name="entity">
						<input type="hidden" value="<?= $value['id'] ?>" name="id">
						<label for="id">Тип:</label>
						<input type="number" name="type" value="<?= $value['type'] ?>">
						<label for="id">Цена:</label>
						<input type="number" name="price" value="<?= $value['price'] ?>">
						<input type="submit" name="submit" value="Сохранить">
						<br>
					</form>
				<?php
				}
			}
			break;

		case 'rent':
			if (isset($_POST['id'])) {
				$id = $_POST['id'];

				$sql = "SELECT rents.id as id, objectId, clientId, dateRent, rentDuration, lastName 
					FROM rents join clients on clients.id = rents.clientId WHERE rents.id = ('$id')";

				$rents = $conn->query($sql);

				$sqlClients = "SELECT * FROM clients";
				$сlients = mysqli_query($conn, $sqlClients);

				$sqlObjects = "SELECT * FROM objects";
				$objects = mysqli_query($conn, $sqlObjects);

				foreach ($rents as $value) {
				?>
					<form action="../crud/create.php" method="POST">
						<br>
						<input type="hidden" value="rent" name="entity">
						<select name="objectId">
							<?php foreach ($objects as $object) { ?>
								<option value="<?= $object['id'] ?>"><?= $object['id'] ?></option>
							<?php } ?>
							<option value="<?= $value['objectId'] ?>" selected disabled hidden><?= $value['objectId'] ?></option>
						</select>
						<select name="clientId">
							<?php foreach ($сlients as $сlient) { ?>
								<option value="<?= $сlient['id'] ?>"><?= $сlient['lastName'] ?></option>
							<?php } ?>
							<option value="<?= $value['clientId'] ?>" selected disabled hidden><?= $value['lastName'] ?></option>
						</select>
						<input type="date" name="dateRent" value="<?= $value['dateRent'] ?>">
						<input type="number" name="rentDuration" placeholder="Количество месяцев" value="<?= $value['rentDuration'] ?>">
						<input type="submit" name="submit" value="Сохранить">
						<br>
					</form>
				<?php
				}
			}
			break;

		default:
			echo "Неизвестная сущность";
	}
}

$conn->close();

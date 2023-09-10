<?php
include '../config.php';
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

				$sql = "DELETE FROM clients WHERE id = ('$id')";

				$conn->query($sql);
			}
			header('Location: ../clients');
			break;

		case 'object':
			if (isset($_POST['id'])) {
				$id = $_POST['id'];

				$sql = "DELETE FROM objects WHERE id = ('$id')";

				$conn->query($sql);
			}
			header('Location: ../objects');
			break;

		case 'rent':
			if (isset($_POST['id'])) {
				$id = $_POST['id'];

				$sql = "DELETE FROM rents WHERE id = ('$id')";

				$conn->query($sql);
			}
			header('Location: ../rents');
			break;
		default:
			echo "Неизвестная сущность";
	}
}

$conn->close();

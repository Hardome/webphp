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
			if (isset($_POST['lastName'])) {
				$id = $_POST['id'];
				$lastName = $_POST['lastName'];

				$sql = "UPDATE clients SET lastName = ('$lastName') WHERE id = ('$id')";

				$conn->query($sql);
			}
			header('Location: ../clients');
			break;

		case 'object':
			if (isset($_POST['type']) && isset($_POST['price'])) {
				$id = $_POST['id'];
				$type = $_POST['type'];
				$price = $_POST['price'];

				$sql = "UPDATE objects SET type = ('$type'), price = ('$price') WHERE id = ('$id')";

				$conn->query($sql);
			}
			header('Location: ../objects');
			break;

		case 'rent':
			if (isset($_POST['objectId']) && isset($_POST['clientId']) && isset($_POST['dateRent']) && isset($_POST['rentDuration'])) {
				$id = $_POST['id'];
				$rentDuration = $_POST['rentDuration'];
				$objectId = $_POST['objectId'];
				$clientId = $_POST['clientId'];
				$dateRent = $_POST['dateRent'];

				$sql = "UPDATE rents SET rentDuration = ('$rentDuration'), objectId = ('$objectId'), clientId = ('$clientId'),
				 	dateRent = ('$dateRent') WHERE id = ('$id')";

				$conn->query($sql);
			}
			header('Location: ../rents');
			break;


		default:
			echo "Неизвестная сущность";
	}
}

$conn->close();

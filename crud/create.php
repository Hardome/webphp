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
				$lastName = $_POST['lastName'];

				$sql = "INSERT INTO clients (lastName) VALUES ('$lastName')";

				$conn->query($sql);
			}
			header('Location: ../clients');
			break;

		case 'object':
			if (isset($_POST['type']) && isset($_POST['price'])) {
				$type = $_POST['type'];
				$price = $_POST['price'];

				$sql = "INSERT INTO objects (type, price) VALUES ('$type', $price)";

				$conn->query($sql);
			}
			header('Location: ../objects');
			break;

		case 'rent':
			if (isset($_POST['objectId']) && isset($_POST['clientId']) && isset($_POST['dateRent']) && isset($_POST['rentDuration'])) {
				$objectId = $_POST['objectId'];
				$clientId = $_POST['clientId'];
				$dateRent = $_POST['dateRent'];
				$rentDuration = $_POST['rentDuration'];

				$sql = "INSERT INTO rents (objectId, clientId, dateRent, rentDuration)
                    VALUES ('$objectId', '$clientId', '$dateRent', '$rentDuration')";

				$conn->query($sql);
			}
			header('Location: ../rents');
			break;


		default:
			echo "Неизвестная сущность";
	}
}

$conn->close();

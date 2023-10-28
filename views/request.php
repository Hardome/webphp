<?php
$lines = file('./newBase.txt');
$regionName = $_GET['region'];
$sortedResidents = [];

function sortResidentsByLastName($residents) {
	$lastNames = array_column($residents, 'lastName');
	array_multisort($lastNames, SORT_ASC, $residents);
	return $residents;
}

if($regionName) {
	$residents = [];

	foreach ($lines as $line) {
		$values = explode(';', $line);

		if ($values[6] == $regionName) {
			$name = $values[1];
			$lastName = $values[3];
			$sex = $values[4];
			$birthDate = $values[9];
			$postAddress = $values[14];

			$age = date_diff(date_create($birthDate), date_create('today'))->y;
			$nameColor = ($sex == 'Жен') ? 'pink' : 'blue';

			$residents[] = [
				'firstName' => $name,
				'lastName' => $lastName,
				'age' => $age,
				'postAddress' => $postAddress,
				'nameColor' => $nameColor
			];
		}
	}
	$sortedResidents = sortResidentsByLastName($residents);
} else {
	echo 'Ведите в поисковой строке регион (Двухсимвольный код)';
}
?>

<link rel='stylesheet' href='../views/styles.css'>
<div class="links">
	<a href="/stats">Статистика</a>
	<a href="/parse">Парсер</a>
</div>

<?php foreach ($sortedResidents as $resident) { ?>
	<div class="resident">
		<div class="<?= $resident['nameColor']?>">
			<?= $resident['lastName'] ?> <?= $resident['firstName'] ?> 
		</div>
		<div>
			Возраст: <?= ($resident['age']) ?> Почтовый адрес: <?= $resident['postAddress'] ?>
		</div>
	</div>
<?php } ?>
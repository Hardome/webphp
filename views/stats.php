<?php
$lines = file('./newBase.txt');

$mansCount = 0; //мужчины
$mansHeight = 0;
$mansHeightArray = [];
$mansWeight = 0;
$mansWeightArray = [];
$mansAge = 0;
$mansAgeArray = [];

$womansCount = 0; //женщины
$womansHeight = 0;
$womansHeightArray = [];
$womansWeight = 0;
$womansWeightArray = [];
$womansAge = 0;
$womansAgeArray = [];

//ниже среднего
$mansBelowAverageHeightCount = 0;
$mansBelowAverageWeightCount = 0;
$mansBelowAverageAgeCount = 0;

//среднячок
$mansAverageHeightCount = 0;
$mansAverageWeightCount = 0;
$mansAverageAgeCount = 0;

//выше среднего
$mansAboveAverageHeightCount = 0;
$mansAboveAverageWeightCount = 0;
$mansAboveAverageAgeCount = 0;

//ниже среднего
$womansBelowAverageHeightCount = 0;
$womansBelowAverageWeightCount = 0;
$womansBelowAverageAgeCount = 0;

//среднячок
$womansAverageHeightCount = 0;
$womansAverageWeightCount = 0;
$womansAverageAgeCount = 0;

//выше среднего
$womansAboveAverageHeightCount = 0;
$womansAboveAverageWeightCount = 0;
$womansAboveAverageAgeCount = 0;

$specialDates = ['01/01', '01/07', '02/14', '02/23', '03/08', '05/01', '12/31'];

$people = [];

function isSpecialDate($date) {
  global $specialDates;
  return in_array($date, $specialDates);
}

//считаю среднее
foreach ($lines as $line) {
  $values = explode(';', $line);

  $sex = $values[4];
  $name = $values[1];
  $weight = isset($values[12]) ? intval($values[12]) : null;
  $height = isset($values[13]) ? intval($values[13]) : null;
  $birthday = isset($values[9]) ? DateTime::createFromFormat('m/d/Y', $values[9]) : null;

  $birthdate = date('m/d', strtotime($values[9]));

  if (isSpecialDate($birthdate)) {
    if (!isset($people[$birthdate])) {
        $people[$birthdate] = [];
    }
    $people[$birthdate][] = $name;
}

  if ($birthday) {
    $today = new DateTime();
    $age = $today->diff($birthday)->y;
  }

  if ($sex === 'Муж') {
    $mansCount++;
    $mansHeight += $height;
    $mansHeightArray[] = $height;
    $mansWeight += $weight;
    $mansWeightArray[] = $weight;
    $mansAge += $age;
    $mansAgeArray[] = $age;
  } else if ($sex === 'Жен') {
    $womansCount++;
    $womansHeight += $height;
    $womansHeightArray[] = $height;
    $womansWeight += $weight;
    $womansWeightArray[] = $weight;
    $womansAge += $age;
    $womansAgeArray[] = $age;
  }
}
$mansAverageHeight = round($mansHeight / $mansCount);
$mansAverageWeight = round($mansWeight / $mansCount);
$mansAverageAge = round($mansAge / $mansCount);

$womansAverageHeight = round($womansHeight / $womansCount);
$womansAverageWeight = round($womansWeight / $womansCount);
$womansAverageAge = round($womansAge / $womansCount);

foreach ($mansHeightArray as $height) {
  if ($height < $mansAverageHeight) {
    $mansBelowAverageHeightCount++;
  } elseif ($height > $mansAverageHeight) {
    $mansAboveAverageHeightCount++;
  } else {
    $mansAverageHeightCount++;
  }
}

foreach ($mansWeightArray as $weight) {
  if ($weight < $mansAverageWeight) {
    $mansBelowAverageWeightCount++;
  } elseif ($weight > $mansAverageWeight) {
    $mansAboveAverageWeightCount++;
  } else {
    $mansAverageWeightCount++;
  }
}

foreach ($mansAgeArray as $age) {
  if ($age < $mansAverageAge) {
    $mansBelowAverageAgeCount++;
  } elseif ($age > $mansAverageAge) {
    $mansAboveAverageAgeCount++;
  } else {
    $mansAverageAgeCount++;
  }
}


//womans
foreach ($womansHeightArray as $height) {
  if ($height < $womansAverageHeight) {
    $womansBelowAverageHeightCount++;
  } elseif ($height > $womansAverageHeight) {
    $womansAboveAverageHeightCount++;
  } else {
    $womansAverageHeightCount++;
  }
}

foreach ($womansWeightArray as $weight) {
  if ($weight < $womansAverageWeight) {
    $womansBelowAverageWeightCount++;
  } elseif ($weight > $womansAverageWeight) {
    $womansAboveAverageWeightCount++;
  } else {
    $womansAverageWeightCount++;
  }
}

foreach ($womansAgeArray as $age) {
  if ($age < $womansAverageAge) {
    $womansBelowAverageAgeCount++;
  } elseif ($age > $womansAverageAge) {
    $womansAboveAverageAgeCount++;
  } else {
    $womansAverageAgeCount++;
  }
}

// echo $mansCount . '<br>';
// echo $mansAverageHeight . '<br>';
// echo $mansAverageWeight . '<br>';
// echo $mansAverageAge . '<br>';

// echo $mansBelowAverageHeightCount . '<br>';
// echo $mansBelowAverageWeightCount . '<br>';
// echo $mansBelowAverageAgeCount . '<br>';

// echo $mansAverageHeightCount . '<br>';
// echo $mansAverageWeightCount . '<br>';
// echo $mansAverageAgeCount . '<br>';

// echo $mansAboveAverageHeightCount . '<br>';
// echo $mansAboveAverageWeightCount . '<br>';
// echo $mansAboveAverageAgeCount . '<br>';


// echo $womansBelowAverageHeightCount . '<br>';
// echo $womansBelowAverageWeightCount . '<br>';
// echo $womansBelowAverageAgeCount . '<br>';

// echo $womansAverageHeightCount . '<br>';
// echo $womansAverageWeightCount . '<br>';
// echo $womansAverageAgeCount . '<br>';

// echo $womansAboveAverageHeightCount . '<br>';
// echo $womansAboveAverageWeightCount . '<br>';
// echo $womansAboveAverageAgeCount . '<br>';



// echo $womansCount . '<br>';
// echo $womansAverageHeight . '<br>';
// echo $womansAverageWeight . '<br>';
// echo $womansAverageAge . '<br>';
?>

<link rel='stylesheet' href='./views/styles.css'>
<div class="links">
  <a href="/parse">Парсер</a>
  <a href="/request/?region=">Get-запрос</a>
</div>


<table>
  <tr>
    <td>&nbsp;</td>
    <td>Мужчины</td>
    <td>Женщины</td>
  </tr>
  <tr>
    <td>Количество</td>
    <td><?= $mansCount ?></td>
    <td><?= $womansCount ?></td>
  </tr>
  <tr>
    <td>Средний рост</td>
    <td><?= $mansAverageHeight ?></td>
    <td><?= $womansAverageHeight ?></td>
  </tr>
  <tr>
    <td>Средний вес</td>
    <td><?= $mansAverageWeight ?></td>
    <td><?= $womansAverageWeight ?></td>
  </tr>
  <tr>
    <td>Средний возраст</td>
    <td><?= $mansAverageAge ?></td>
    <td><?= $womansAverageAge ?></td>
  </tr>
</table>

<table>
  <tr>
    <td>&nbsp;</td>
    <td>Мужчины</td>
    <td>Женщины</td>
  </tr>
  <tr>
    <td>Рост</td>
  </tr>
  <tr>
  <td>Ниже среднего</td>
    <td><?= $mansBelowAverageHeightCount ?></td>
    <td><?= $womansBelowAverageHeightCount ?></td>
  </tr>
  <tr>
  <td>Средний</td>
    <td><?= $mansAverageHeightCount ?></td>
    <td><?= $womansAverageHeightCount ?></td>
  </tr>
  <tr>
  <td>Выше среднего</td>
    <td><?= $mansAboveAverageHeightCount ?></td>
    <td><?= $womansAboveAverageHeightCount ?></td>
  </tr>
  <tr>
    <td>Вес</td>
  </tr>
  <tr>
  <td>Ниже среднего</td>
    <td><?= $mansBelowAverageWeightCount ?></td>
    <td><?= $womansBelowAverageWeightCount ?></td>
  </tr>
  <tr>
  <td>Средний</td>
  <td><?= $mansAverageWeightCount ?></td>
    <td><?= $womansAverageWeightCount ?></td>
  </tr>
  <tr>
  <td>Выше среднего</td>
    <td><?= $mansAboveAverageWeightCount ?></td>
    <td><?= $womansAboveAverageWeightCount ?></td>
  </tr>
  <tr>
    <td>Возраст</td>
  </tr>
  <tr>
  <td>Ниже среднего</td>
    <td><?= $mansBelowAverageAgeCount ?></td>
    <td><?= $womansBelowAverageAgeCount ?></td>
  </tr>
  <tr>
  <td>Средний</td>
    <td><?= $mansAverageAgeCount ?></td>
    <td><?= $womansAverageAgeCount ?></td>
  </tr>
  <tr>
  <td>Выше среднего</td>
    <td><?= $mansAboveAverageAgeCount ?></td>
    <td><?= $womansAboveAverageAgeCount ?></td>
  </tr>
</table>

<?php foreach ($people as $birthdate => $names) { ?>
  <div class="bold">День: <?= $birthdate ?></div>
  <div>Имена: <?= implode(', ', $names) ?></div>
<?php } ?>
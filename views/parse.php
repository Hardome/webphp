<?php
	$lines = file('./OLDBASE.txt');

	function replaceSex($sex) {
		return $sex === 'male' ? 'Муж' : 'Жен';
	}

	function addZero($id) {
		return $id ? str_pad($id, 6, '0', STR_PAD_LEFT) : null;
	}

	function replacePhone($phone) {
		if (!isset($phone)) {
			return null;
		}

		$phone = str_replace('-','', $phone);

		if (strlen($phone) === 10) {
			$phone = substr_replace($phone, '-', 3, 0);
			$phone = substr_replace($phone, '-', 7, 0);
		} elseif (strlen($phone) === 9) {
			$phone = substr_replace($phone, '-', 2, 0);
			$phone = substr_replace($phone, '-', 6, 0);
		} elseif (strlen($phone) === 8) {
			$phone = substr_replace($phone, '-', 1, 0);
			$phone = substr_replace($phone, '-', 5, 0);
		}

		return $phone;
	}

	function validate($value, $regex) {
		preg_match($regex, $value, $matches);

    return $matches[0] ?? null;
	}

	$arrToFile = [];

	foreach ($lines as $line) {
		$values = explode(',', $line);
		$valuesCount = count($values);

		if ($valuesCount === 0) {
      continue; //если вообще нет ничего, пропуск строки
    }

		$validValues = [];

		$id = $values[0] ? addZero(validate($values[0], '/^\d+$/')) : null; //Целое число
		$name = $valuesCount >= 2 ? validate($values[1], '/^[A-Za-zА-Яа-я]+$/') : null; //Одно слово
		$middleName = $valuesCount >= 3 ? validate($values[2], '/^[A-Za-zА-Яа-я]$/') . '.' : null; //Буква и точка (Отчество)
		$lastName = $valuesCount >= 4 ? validate($values[3], '/^[A-Za-zА-Яа-я]+$/') : null; //Одно слово  
		$sex = $valuesCount >= 5 ? replaceSex(validate($values[4], '/^male$|^female$/')) : null; // (female / male)
		$city = $valuesCount >= 6 ? validate($values[5], '/([A-Za-zА-Яа-я]+\s?)+/') : null; //Одно или несколько слов
		$region = $valuesCount >= 7 ? validate($values[6], '/^[A-Za-zА-Яа-я0-9]{2}$/') : null; //Двухсимвольное значение
		$email = $valuesCount >= 8 ? validate($values[7], '/[^A-Za-z0-9@.]/') : null;
		$phone = $valuesCount >= 9 ? replacePhone(validate($values[8], '/^\d+-\d+-\d+$/')) : null; // 8,9,10 значный, разделенный дефисами
		$birthDay = $valuesCount >= 10 ? validate($values[9], '/^^\d+\/\d+\/\d+$/') : null; // m/d/yyyy
		$position = $valuesCount >= 11 ? validate($values[10], '/([A-Za-zА-Яа-я]+\s?)+/') : null; //Одно или несколько слов
		$company = $valuesCount >= 12 ? validate($values[11], '/([A-Za-zА-Яа-я]+\s?)+/') : null; //Одно или несколько слов
		$weight = $valuesCount >= 13 ? round(validate($values[12], '/^\d+.\d+$|\d/')) : null; //Дробное число
		$height = $valuesCount >= 14 ? validate($values[13], '/^\d+/') : null; //Целое число
		$postAddress = $valuesCount >= 15 && $values[14] ?? null; //Целое число, пробел, одно или несколько слов
		$postCode = $valuesCount >= 16 ? validate($values[15], '/^\d+/') : null; //Целое число
		$countryCode = $valuesCount >= 17 ? validate($values[16], '/^[A-Za-zА-Яа-я]{2}$/') : null; //Двухбуквенный код

		array_push(
			$validValues, 
			$id, 
			$name, 
			$middleName, 
			$lastName, 
			$sex, 
			$city, 
			$region, 
			$email, 
			$phone, 
			$birthDay, 
			$position, 
			$company, 
			$weight,
			$height,
			$postAddress,
			$postCode,
			$countryCode
		);

		echo implode(';', $validValues) . '<br>';

		//запись в файл
		array_push($arrToFile, implode(';', $validValues) . "\n");
	}

	file_put_contents('./newBase.txt', $arrToFile);

	//TODO EMAIL
?>

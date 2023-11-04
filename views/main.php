<?php
  include 'config.php';
  $conn = new mysqli($servername, $username, $password, $dbname);
  $typesSQL = "SELECT DISTINCT type from cars";

  $types = mysqli_query($conn, $typesSQL);

?>

<link rel='stylesheet' href='../views/styles.css'>

<script>

function getMarks(value) {
  const mark = value;

  if (mark) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("mark").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "getMarks.php?type=" + mark, true);
    xmlhttp.send();
  }

}


function calculate(str) {
  const type = document.getElementById('type').value;
  const mark = document.getElementById('mark').value;
  const distance = document.getElementById('distance').value;

  if (type && mark && distance) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("result").value = this.responseText;
      }
    };
    xmlhttp.open("GET", "calculate.php?type=" + type + "&mark=" + mark + "&distance=" + distance, true);
    xmlhttp.send();
  }
}
</script>

<form action="">
  <label for="type">Вид транспорта:</label>
  <select id="type" onchange="getMarks(this.value)">
    <option value="" selected disabled hidden>выберите</option>
    <?php foreach ($types as $type) { ?>
			<option value="<?= $type['type'] ?>"><?= $type['type'] ?></option>
		<?php } ?>
  </select>

  <label for="mark">Марка:</label>
  <select id="mark" onchange="calculate()">
    <option value="" selected disabled hidden>выберите</option>
  </select>

  <label for="distance">Расстояние:</label>
  <input type="number" id="distance" min="0" onchange="calculate()">

  <label for="result">Расход бензина:</label>
  <input id="result">
</form>
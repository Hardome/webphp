<?php

?>

<link rel='stylesheet' href='../views/styles.css'>

<script>
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "gethint.php?q=" + str, true);
    xmlhttp.send();
  }

  alert('asdd')
}
</script>

<form action="">
  <label for="type">Вид транспорта:</label>
  <select name="type" id="pet-select" onchange="showHint(this.value)">>
    <option value=""></option>
  </select>

  <label for="mark">Марка:</label>
  <select name="mark" id="pet-select" onchange="showHint(this.value)">
    <option value=""></option>
  </select>

  <label for="range">Расстояние:</label>
  <input type="number" name="range" value="0" onchange="showHint(this.value)">

  <label for="result">Расход бензина:</label>
  <input disabled type="number" name="result" value="000">
</form>
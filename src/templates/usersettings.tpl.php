<?php

include 'partials/header.tpl.php';
include 'partials/nav2.tpl.php';
?>

<div class="usersettingsdiv">
    <h1>Configuració</h1>
</div>

<form id="formusersettings" action="?url=usersettingsaction" method='POST'>
    <label for="backgroundcolor">Color de fons</label>
    <input type="color" name="backgroundcolor" id=""></input>
    <label for="lettercolor">Color de lletra</label>
    <input type="color" name="fontcolor" id=""></input>
    <button type="submit">Guardar configuració</button>
</form>
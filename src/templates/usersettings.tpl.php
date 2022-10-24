<!-- Pagina donde el usuario puede cambiar el bacgrkoundcolor del body y del header  -->

<?php

include 'partials/header.tpl.php';
include 'partials/nav2.tpl.php';

// $usuarioactivo = ($_SESSION['user']['username'] == json_decode($_COOKIE['usersettings'])->user);

?>

<!-- script de js que cambia los colores -->
<script src="src\scripts\usersettings.js"></script>

<div class="usersettingsdiv">
    <h1>Configuració</h1>
</div>
<!-- form con dos input color para que el usuario seleccione el color -->
<form id="formusersettings" action="?url=usersettingsaction" method='POST'>
    <label for="backgroundcolor">Color de fons</label>
    <input value="<?php print (isset($_COOKIE['usersettings'])) ?  json_decode($_COOKIE['usersettings'])->backgroundcolor : '#0000';  ?>" type="color" name="backgroundcolor" id=""></input>
    <label for="lettercolor">Color del navegador</label>
    <input value="<?php print (isset($_COOKIE['usersettings'])) ?  json_decode($_COOKIE['usersettings'])->backgroundcolorHeader : '#0000';  ?>" type="color" name="backgroundcolorHeader" id=""></input>
    <button id="saveusersettings" type="submit">Guardar configuració</button>
</form>
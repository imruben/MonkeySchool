<?php

require 'src/db.php';
require 'config.php';
require 'src/render.php';

//recibe los dos colores del form de 'usersettings.tpl.php'
$backgroundcolor = $_POST['backgroundcolor'];
$backgroundcolorHeader = $_POST['backgroundcolorHeader'];

//lee el usuario actual de la sesión
$userActual = $_SESSION['user']['username'];

//guarda los settings y el username en un array assoc.
$usersettings = ["user" => $userActual, "backgroundcolor" => $backgroundcolor, "backgroundcolorHeader" => $backgroundcolorHeader];



//guarda el array en formato 'json' (para poderse leer desde js) y setea una cookie.
setcookie("usersettings", json_encode($usersettings), (time() + (10 * 365 * 24 * 60 * 60)));
header('Location: ?url=usersettings');

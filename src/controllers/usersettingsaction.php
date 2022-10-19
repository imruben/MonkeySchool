<?php

require 'src/db.php';
require 'config.php';
require 'src/render.php';

$backgroundcolor = $_POST['backgroundcolor'];
$fontcolor = $_POST['fontcolor'];

$usersettings = ["user" => $_SESSION['user']['username'], "backgroundcolor" => $backgroundcolor, "fontcolor" => $fontcolor];

print json_encode($usersettings);

setcookie("usersettings", json_encode($usersettings), (time() + (10 * 365 * 24 * 60 * 60)));

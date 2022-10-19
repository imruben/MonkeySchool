<?php

require 'src/db.php';
require 'config.php';
require 'src/render.php';

$backgroundcolor = $_POST['backgroundcolor'];
$backgroundcolorHeader = $_POST['backgroundcolorHeader'];

$usersettings = ["user" => $_SESSION['user']['username'], "backgroundcolor" => $backgroundcolor, "backgroundcolorHeader" => $backgroundcolorHeader];
// print json_encode($usersettings);
setcookie("usersettings", json_encode($usersettings), (time() + (10 * 365 * 24 * 60 * 60)));
echo render('dashboard');

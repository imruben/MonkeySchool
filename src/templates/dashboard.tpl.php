<?php
include 'partials/header.tpl.php';
include 'partials/nav2.tpl.php';
?>

<div id="welcomemessage">
    <h1><?php print "SESSION: Bienvenido " . $_SESSION['username'] ?></h1>
    <h1><?php print "COOKIE: Bienvenido " . $_COOKIE['username'] ?></h1>
</div>

</html>
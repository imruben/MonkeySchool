<?php

include 'partials/header.tpl.php';
include 'partials/nav2.tpl.php';
?>
<script src="src\scripts\usersettings.js"></script>
<div id="welcomemessage">
    <h1><?php print "Bienvenido " . $_SESSION['user']['username'] ?></h1>
    <h3> <?php print "Ultima visita: " . $_SESSION['user']['last_visit']; ?></h3>
</div>

</html>
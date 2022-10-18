<?php

use function PHPSTORM_META\type;

include 'partials/header.tpl.php';
include 'partials/nav2.tpl.php';
?>

<div id="welcomemessage">
    <h1><?php print "Bienvenido " . $_SESSION['user']['username'] ?></h1><br><br><br>
    <!-- <h2><?php /*foreach ($_SESSION['user'] as $index => $value) {
            print $index . ":" . $value . "\n";
        } */ ?></h2> -->
    <h3> <?php
            // print type($);   
            // $date = new DateTime($_SESSION['user']['last_visit']);
            print "Ultima visita: " . $_SESSION['user']['last_visit'];
            ?></h3>
</div>

</html>
<?php
include 'partials/header.tpl.php';
include 'partials/nav.tpl.php';
?>

<div class="login">
    <form id="formlogin" action="?url=logaction" method='POST'>
        <label for="email">Email</label>
        <input type="text" name="email" id="" placeholder="youremail@gmail.com" required><br><br>
        <label for="password">Contraseña</label>
        <input type="text" name="password" placeholder="1234" required>
        <p>¿Eres un mono?</p>
        <input type="checkbox" name="ismonkey">
        <p>Recordar-me en aquest equip</p>
        <input type="checkbox" name="rememberuser">
        <button type="submit" class="formloginbutton">Iniciar Sesión</button>
        <p id="logmessage">
            <?php if (isset($logmessage)) {
                print $logmessage;
            } ?>
        </p>
    </form>
</div>
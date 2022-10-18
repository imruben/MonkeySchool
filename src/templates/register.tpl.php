<?php
include 'partials/header.tpl.php';
include 'partials/nav2.tpl.php';
?>

<div class="login">
    <form id="formlogin" action="?url=registeraction" method='POST'>
        <label for="email">Email</label>
        <input type="text" name="email" id="" placeholder="youremail@gmail.com" required><br><br>
        <label for="username">Nombre de usuario</label>
        <input type="text" name="username" id="" placeholder="pepeViyuela" required><br><br>
        <label for="password">Contraseña</label>
        <input type="text" name="password" placeholder="1234" required>
        <p>¿Eres un mono?</p>
        <input type="checkbox" name="ismonkey">
        <button type="submit" class="formloginbutton">Registrarse</button>
        <p id="registermessage">
            <?php if (isset($registermessage)) {
                print $registermessage;
            } ?>
        </p>
    </form>
</div>
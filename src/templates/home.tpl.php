<?php
include 'partials/header.tpl.php';
include 'partials/nav.tpl.php';
?>


<div id="home">
    <video id="videomonoshome" autoplay loop muted>
        <source src="public\img\monoshome.mp4" type="video/mp4">
    </video>
</div>

<div class="loginmodal hidden">
    <form class="formlogin" action="?url=logaction" method='POST'>
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="youremail@gmail.com" required><br><br>
        <label for="password">Contraseña</label>
        <input type="password" name="password" placeholder="********" required>
        <p>¿Eres un mono?</p>
        <input type="checkbox" name="ismonkey" required>
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


<div class="registermodal hidden">
    <form class="formlogin" action="?url=registeraction" method='POST'>
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="youremail@gmail.com" required><br><br>
        <label for="username">Nombre de usuario</label>
        <input type="text" name="username" placeholder="pepeViyuela" required><br><br>
        <label for="password">Contraseña</label>
        <input type="password" name="password" placeholder="1234" required>
        <p>¿Eres un mono?</p>
        <input type="checkbox" name="ismonkey" required>
        <button type="submit" class="formloginbutton">Registrarse</button>
        <p id="registermessage">
            <?php if (isset($registermessage)) {
                print $registermessage;
            } ?>
        </p>
    </form>
</div>

<div class="overlay hidden"></div>
<script src="src\scripts\modalshome.js"></script>

</html>
<?php
include 'partials/header.tpl.php';
include 'partials/nav.tpl.php';
?>

<!-- Pagina principal mientras no se haya iniciado sesion -->
<div id="home">
    <video id="videomonoshome" autoplay loop muted>
        <source src="public\img\monoshome.mp4" type="video/mp4">
    </video>
</div>

<!-- Mensajes de error de login o de register correcto si 
ha llegado la variable del mensaje del logaction o registeraction -->
<?php if (isset($logmessage)) {
    print '
    <p id="logmessageerror">
     ' . $logmessage . '
    </p>';
    unset($logmessage);
} else if (isset($registermessage)) {
    print '
    <p id="registermessage">
     ' . $registermessage . '
    </p>';
    unset($registermessage);
}
?>

<!-- modal para logear  -->
<div class="loginmodal hidden">
    <form class="formlogin animate" action="?url=logaction" method='POST'>
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="youremail@gmail.com" required><br><br>
        <label for="password">Contraseña</label>
        <input type="password" name="password" placeholder="********" required>
        <p>¿Eres un mono?</p>
        <input type="checkbox" name="ismonkey" required>
        <p>Recordar-me en aquest equip</p>
        <input type="checkbox" name="rememberuser">
        <button type="submit" class="formloginbutton">Iniciar Sesión</button>

    </form>
</div>

<!-- modal para registrarse -->
<div class="registermodal hidden">
    <form class="formlogin animate" action="?url=registeraction" method='POST'>
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="youremail@gmail.com" required><br><br>
        <label for="username">Nombre de usuario</label>
        <input type="text" name="username" placeholder="pepeViyuela" required><br><br>
        <label for="password">Contraseña</label>
        <input type="password" name="password" placeholder="1234" required>
        <p>¿Eres un mono?</p>
        <input type="checkbox" name="ismonkey" required>
        <button type="submit" class="formloginbutton">Registrarse</button>

    </form>
</div>
<!-- overlay necesario para hacer la animación de los modals -->
<div class="overlay hidden"></div>

<!-- scripts para los modals -->
<script src="src\scripts\modalshome.js"></script>

</html>
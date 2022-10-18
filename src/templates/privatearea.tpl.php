<?php
include 'partials/header.tpl.php';
include 'partials/nav2.tpl.php';
?>


<div class="privatearea">
    <h1>AREA PRIVADA</h1>
    <div class="privatearea1">
        <form>
            <label for="email">Email</label>
            <input type="text" name="email" id="" placeholder="youremail@gmail.com" required><br><br>
            <label for="password">Contraseña</label>
            <input type="text" name="password" placeholder="1234" required>

            <button type="submit" class="formloginbutton">Iniciar Sesión</button>
            <p id="logmessage">
                <?php if (isset($logmessage)) {
                    print $logmessage;
                } ?>
            </p>
        </form>
        <h3>Usuari:<?php print $_SESSION['user']['username'] ?></h3>
        <h3>Contrasenya: <?php print $_SESSION['user']['password'] ?> </h3>
        <h3>Email: <?php print $_SESSION['user']['email'] ?></h3>
    </div>
    <div class="privatearea2"></div>


</div>

</HTML>
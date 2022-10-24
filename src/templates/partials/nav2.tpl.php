<!-- nav para cuando el usuario haya iniciado sesion -->

<header>
    <div class="caja1">
        <div class="cosa">
            <a href="?url=dashboard">
                <img class="logo" src="public/img/logo.png" alt="Viva los monos"> </a>
            <p><?php print $_SESSION['user']['username'] ?></p>
        </div>
    </div>


    <div class="caja2">
        <i id="settingsicon" class="material-icons">settings</i>
        <a id="settingsbutton" class="navlink button" href="?url=usersettings">
            Configuració</a>
        <a class="navlink derecha" href="?url=privatearea">Area Privada</a>
        <a href="?url=closesession"><button id="closesession">Cerrar sesion</button></a>
    </div>

</header>
<!-- script js para que se vea visualmente donde se encuentra el usuario -->
<script src="src\scripts\nav.js"></script>
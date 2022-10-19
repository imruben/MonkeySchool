<header>

    <div class="caja1">
        <div class="cosa">
            <a href="?url=dashboard">
                <img class="logo" src="public/img/logo.png" alt="Viva los monos"> </a>
            <p><?php print $_SESSION['user']['username'] ?></p>
        </div>
    </div>


    <div class="caja2">
        <a id="settingsbutton" class="button" href="?url=usersettings"><i id="settingsicon" class="material-icons">settings</i>
            Configuració</a>
        <a class="derecha" href="?url=privatearea">Area Privada</a>
        <a href="?url=closesession"><button id="closesession">Cerrar sesion</button></a>
    </div>

</header>
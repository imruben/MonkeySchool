<header>
    <div>
        <a href="#">
            <img class="logo" src="public/img/logo.png" alt="Viva los monos">
            <p><?php print $_SESSION['username'] ?></p>
        </a>

    </div>
    <nav>
        <ul class="nav__links">
            <li><a href="?url=privatearea">Area Privada</a></li>
            <li><a href="#">Nav</a></li>
            <li><a href="#">Nav</a></li>
        </ul>
    </nav>
    <a id="settingsbutton" class="button" href="?url=usersettings"><i id="settingsicon" class="material-icons">settings</i>
        Configuració</a>
    <a href="?url=closesession"><button id="closesession">Cerrar sesion</button></a>
</header>
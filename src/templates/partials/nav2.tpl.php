<header>
    <div>
        <a href="#">
            <img class="logo" src="public/img/logo.png" alt="Viva los monos">
            <p><?php print $_SESSION['username'] ?></p>
        </a>

    </div>
    <nav>
        <ul class="nav__links">
            <li><a href="#">Nav</a></li>
            <li><a href="#">Nav</a></li>
            <li><a href="#">Nav</a></li>
        </ul>
    </nav>
    <a href="?url=closesession"><button id="closesession">Cerrar sesion</button></a>
</header>
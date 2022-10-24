<?php
require 'src/render.php';

//cierra la sesión con un 'sesion_destroy'
session_destroy();

//mirar si existe la cookie 'remember_user'
//->si existe se borra la cookie para que no recuerde al usuario más
if (isset($_COOKIE['user_remembered'])) {
    unset($_COOKIE['user_remembered']);
    // unset($_COOKIE['usersettings']);
    setcookie('user_remembered', '', time() - 3600, '/');
    // setcookie('usersettings', '', time() - 3600, '/');
}
header('Location: ?url=home');
// echo render('home');

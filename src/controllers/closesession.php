<?php
require 'src/render.php';

session_destroy();

//mirar si existe la cookie 'remember_user'
if (isset($_COOKIE['username'])) {
    unset($_COOKIE['username']);
    // unset($_COOKIE['usersettings']);
    setcookie('username', '', time() - 3600, '/'); // empty value and old timestamp
    // setcookie('usersettings', '', time() - 3600, '/');
}
echo render('home');

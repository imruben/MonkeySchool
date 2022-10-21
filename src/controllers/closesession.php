<?php
require 'src/render.php';

session_destroy();

//mirar si existe la cookie 'remember_user'
if (isset($_COOKIE['user_remembered'])) {
    unset($_COOKIE['user_remembered']);
    // unset($_COOKIE['usersettings']);
    setcookie('user_remembered', '', time() - 3600, '/'); // empty value and old timestamp
    // setcookie('usersettings', '', time() - 3600, '/');
}
echo render('home');

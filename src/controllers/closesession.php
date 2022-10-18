<?php
require 'src/render.php';

session_destroy();

//mirar si existe la cookie 'remember_user'
if (isset($_COOKIE['username'])) {
    unset($_COOKIE['username']);
    setcookie('username', '', time() - 3600, '/'); // empty value and old timestamp
}
echo render('home');

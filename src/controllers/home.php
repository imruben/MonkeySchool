<?php
require 'src/render.php';

if (isset($_COOKIE["username"])) {
    echo render('dashboard');
} else {
    echo render('home');
}

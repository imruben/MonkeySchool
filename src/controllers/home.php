<?php
require 'src/render.php';

//existe cookie con el usuario guardado -> enviamos dashboard 
if (isset($_COOKIE["user_remembered"])) {
    echo render('dashboard');
    //no existe cookie -> enviamos home
} else {
    echo render('home');
}

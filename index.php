<?php

//archivo que abrira por predeterminado el hosting (en este caso replit)
session_start();
//define ('APP',__DIR__);
//echo APP;
require 'config.php';
require 'src/router.php';
require 'src/routes.php';

$controlador = getRoute($routes);

require 'src/controllers/' . $controlador . '.php';

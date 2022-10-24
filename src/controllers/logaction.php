<?php

require 'src/db.php';
require 'config.php';
require 'src/render.php';
require 'src/model/validateFunctions.php';


//si el form devuelve datos del post(con el control del html se supone que ha tenido que rellenar datos por el 'required')
if (!empty($_POST['email']) && !empty($_POST['password'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_REQUEST['email'];
        // $email = filter_input(INPUT_SERVER, $_REQUEST['email'], FILTER_S ANITIZE_EMAIL);
        //obviamos el sanitize porque pdo ya tiene seguridad contra el sql injection

        $password = $_REQUEST['password'];
        try {
            //conexion a la base de datos
            $db = connectMysql($dsn, $dbuser, $dbpass);
            //validamos los datos con la funcion auth
            auth($db, $email, $password);
            //catcheamos si hay algun error de PDO
        } catch (PDOException $e) {
            print "Error conexión SQL -> " . $e->getMessage();
        }
    }
}

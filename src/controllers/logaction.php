<?php

require 'src/db.php';
require 'config.php';
require 'src/render.php';
require 'src\model\validateFunctions.php';

try {
    //conexion a la base de datos
    $db = connectMysql($dbhost, $dbuser, $dbpass, $dbname);
    //validamos el form con un select a la base de datos
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_REQUEST['email'];
            $password =  $_REQUEST['password'];
            $queryverifyuser = "SELECT * FROM users WHERE EMAIL = '"  . $email . "'";
            $result = $db->query($queryverifyuser);
            $user = mysqli_fetch_array($result);

            //si los datos coindicen con la query sql 
            //verificamos la password hasheada con 'password_verify'
            if (!is_null($user) && $user['email'] == $email && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                //el usuario selecciona 'recordar usuario' -> 
                //->guardamos cookie '$_COOKIE['user_remembered'] con el username del usuario recordado
                if (isset($_POST['rememberuser'])) {
                    setcookie("user_remembered", $user['username'], (time() + (10 * 365 * 24 * 60 * 60)));
                }
                //insertamos en la bd con un update la ultima visita
                $db->query("UPDATE users SET last_visit = '" . date("Y-m-d H:i:s") . "' WHERE EMAIL = '"  . $email . "'");
                //-> lo llevamos dashboard
                echo render('dashboard');

                //si los datos NO coinciden con la query sql 
                //-> volvemos al home 
                //-> informamos al usuario que esta mal
            } else {
                // $logmessage = $result;
                $logmessage = "Cuenta incorrecta 🐒";
                echo render('home', ['logmessage' => $logmessage]);
            }
        }
    }
    //catcheamos si hay algun error en la conexion sql
} catch (PDOException $e) {
    print "Error conexión SQL -> " . $e->getMessage();
}

$loged = false;

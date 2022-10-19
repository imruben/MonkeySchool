<?php

require 'src/db.php';
require 'config.php';
require 'src/render.php';

try {
    $db = connectMysql($dbhost, $dbuser, $dbpass, $dbname);
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_REQUEST['email'];
            $password =  $_REQUEST['password'];
            $queryverifyuser = "SELECT * FROM users WHERE EMAIL = '"  . $email . "'";
            $result = $db->query($queryverifyuser);
            $user = mysqli_fetch_array($result);

            if (!is_null($user) && $user['email'] == $email && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                if (isset($_POST['rememberuser'])) {
                    setcookie("username", $user['username'], (time() + (10 * 365 * 24 * 60 * 60)));
                }
                $db->query("UPDATE users SET last_visit = '" . date("Y-m-d H:i:s") . "' WHERE EMAIL = '"  . $email . "'");
                echo render('dashboard');
            } else {
                // $logmessage = $result;
                $logmessage = "Cuenta incorrecta";
                echo render('login', ['logmessage' => $logmessage]);
            }
        }
    }
} catch (mysqli_sql_exception $e) {
    print "Error conexión SQL -> " . $e->getMessage();
}

$loged = false;

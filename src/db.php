<?php
require('config.php');

function connectMysql(string $dsn, string $dbuser, string $dbpass)
{
    try {
        $db = new PDO($dsn, $dbuser, $dbpass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        throw new PDOException;
        // die($e->getMessage());
    }
    return $db;
}

function auth(PDO $db, string $email, string $password): bool
{
    $stmt = $db->prepare("SELECT * FROM USERS WHERE email=:email LIMIT 1");
    $res = $stmt->execute([':email' => $email]);
    //si existe una cuenta con ese email->pasamos a verificar pwd
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];

        // var_dump($user);
        //si la contraseña introducida por el usuario es igual a la de la bd
        //->inicio correcto
        if (!is_null($user) && $user['email'] == $email && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            // el usuario selecciona 'recordar usuario' -> 
            // ->guardamos cookie '$_COOKIE['user_remembered'] con el username del usuario recordado
            if (isset($_POST['rememberuser'])) {
                setcookie("user_remembered", $user['username'], (time() + (10 * 365 * 24 * 60 * 60)));
            }
            //insertamos en la bd con un update la ultima visita
            $stmt = $db->prepare("UPDATE users SET last_visit = '" . date("Y-m-d H:i:s") . "' WHERE email=:email");
            $res = $stmt->execute([':email' => $email]);
            //-> lo llevamos dashboard
            // header('src\templates\dashboard.tpl.php');
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
    return false;
}















/*
function connectMysql(string $server, string $userdb, string $passdb, string $dbname)
{
    $conn = new mysqli($dsn,$userdb, $passdb );
    $conn = new mysqli($server, $userdb, $passdb, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
*/
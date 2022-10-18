<?php

// agafar $_REQUEST['email'], i ['password]
// comprova si existeixen a la base de dades
// tenim dos possibl.
// 1. Existeix ==> dashboard i 
// 2. No existeix ==> o retornem a home o ens quedem al login
require 'src/db.php';
require 'config.php';
require 'src/render.php';

try {
  $db = connectMysql($dbhost, $dbuser, $dbpass, $dbname);
  if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['username'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
      $email = $_REQUEST['email'];
      $username = $_REQUEST['username'];
      $password =  $_REQUEST['password'];
      $passwordhashed = password_hash($password, PASSWORD_DEFAULT);

      $result = false;
      // print("INSERT INTO users VALUES(null,'" . $email . "','" . $username . "','" . $passwordhashed . "')");
      try {
        $result = $db->query("INSERT INTO users VALUES(null,'" . $email . "','" . $username . "','" . $passwordhashed . "','" . date("Y-m-d H:i:s") . "')");
      } catch (mysqli_sql_exception $e) {
        $registermessage = $e->getMessage();
        // $registermessage = "Ya existe una cuenta con ese correo o nombre de usuario.";
        // $registermessage = $e->getMessage();
        echo render('register', ['registermessage' => $registermessage]);
      }


      if ($result === true) {
        $logmessage = "Cuenta creada correctamente. Puedes iniciar sesión";
        echo render('login', ['logmessage' => $logmessage]);
      } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  }
} catch (mysqli_sql_exception $e) {
  print "Error SQL -> " . $e->getMessage();
}

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
  //conexion a la bd
  $db = connectMysql($dbhost, $dbuser, $dbpass, $dbname);
  //validacion del form y insertamos los datos en la bd
  if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['username'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
      $email = $_REQUEST['email'];
      $username = $_REQUEST['username'];
      $password =  $_REQUEST['password'];
      //hasheamos la password para mas seguridad
      $passwordhashed = password_hash($password, PASSWORD_DEFAULT);
      $result = false;
      // print("INSERT INTO users VALUES(null,'" . $email . "','" . $username . "','" . $passwordhashed . "')");
      try {
        // print "INSERT INTO users VALUES(null,'" . $email . "','" . $username . "','" . $passwordhashed . "','" . date("Y-m-d H:i:s") . "')";
        $result = $db->query("INSERT INTO users VALUES(null,'" . $email . "','" . $username . "','" . $passwordhashed . "','" . date("Y-m-d H:i:s") . "')");
        //si falla el registro(el insert en la bd) -> volvemos al home y se lo enseñamos al usuario
      } catch (mysqli_sql_exception $e) {
        $registermessage = $e->getMessage();
        // $registermessage = "Ya existe una cuenta con ese correo o nombre de usuario.";
        // $registermessage = $e->getMessage();
        echo render('home', ['registermessage' => $registermessage]);
      }
      //registro en la bd correcto -> llevamos a home y informamos al usuario
      if ($result === true) {
        $registermessage = "Cuenta creada correctamente. Puedes iniciar sesión 🐵 ";
        echo render('home', ['registermessage' => $registermessage]);
      } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  }
} catch (mysqli_sql_exception $e) {
  print "Error SQL -> " . $e->getMessage();
}

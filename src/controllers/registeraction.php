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
  $db = connectMysql($dsn, $dbuser, $dbpass);


  //validacion del form y insertamos los datos en la bd
  if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['username'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
      $email = $_REQUEST['email'];
      $username = $_REQUEST['username'];
      $password =  $_REQUEST['password'];
      //hasheamos la password para mas seguridad
      $passwordhashed = password_hash($password, PASSWORD_DEFAULT);
      $result = false;
      try {
        //insert con datgios del form + fecha actual
        $actualdate = date("Y-m-d H:i:s");
        $stmt = $db->prepare("INSERT INTO USERS(username, email, password, last_visit ) VALUES(?,?,?,?)");
        $res = $stmt->execute(array($username, $email, $passwordhashed, $actualdate));

        //si falla el registro(el insert en la bd) -> volvemos al home y se lo enseñamos al usuario
      } catch (PDOException $e) {
        $registermessage = "Error en el registro.Consulte a don Piqueres ->" . $e->getMessage();
        //Si el codigo = 23000 -> error de unique key (username o email)
        if ($e->getCode() == 23000) {
          $registermessage = "Ya existe un usuario con ese nombre o correo 🙊";
        }
        echo render('home', ['registermessage' => $registermessage]);
      }

      if (!$res) {
      } else {
        //registro en la bd correcto -> llevamos a home y informamos al usuario
        $registermessage = "Cuenta creada correctamente. Puedes iniciar sesión 🐵 ";
        echo render('home', ['registermessage' => $registermessage]);
      }
    }
  }
} catch (PDOException $e) {
  print "Error en la conexion a la bd -> " . $e->getMessage();
}

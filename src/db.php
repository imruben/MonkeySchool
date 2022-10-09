<?php

// function connectSqlite(string $dbname){
// try{
// $db=new PDO('sqlite:'.__DIR__.'/database/'.$dbname.'.sqlite');
// $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
// $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
// }catch(PDOException $e){
// die($e->getMessage());
// }
// return $db;
// }


// function connectMysql(string $dsn,string $userdb,string $passdb){
// try{
// $db = new PDO($dsn, $userdb, $passdb);
// $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
// $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
// }catch(PDOException $e){
// die( $e->getMessage());
// }
// return $db;
// }

function connectMysql(string $server, string $userdb, string $passdb, string $dbname)
{
    // $conn = new mysqli($dsn,$userdb, $passdb );
    $conn = new mysqli($server, $userdb, $passdb, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

<?php
function connectSqlite(string $dbname){
    try{
    $db=new PDO('sqlite:'.__DIR__.'/database/'.$dbname.'.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    }catch(PDOException $e){
    die($e->getMessage());
    }
    return $db;
    }
    function connectMysql(string $dsn,string $dbuser,string $dbpass){
    try{
    $db = new PDO($dsn, $dbuser, $dbpass);
    
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    }catch(PDOException $e){
    die( $e->getMessage());
    }
    return $db;
    }
    /**
     * Undocumented function
     *
     * @param string $db
     * @param string $email
     * @param string $password
     * @return boolean
     */
    function auth(PDO $db, string $email, string $password):bool
    {
        $stmt=$db->prepare("SELECT * FROM USERS WHERE email=:email LIMIT 1");
        $res=$stmt->execute([':email'=>$email]);
        if($stmt->rowCount()==1){
            $user=$stmt->fetchAll()[0];
            //var_dump($user);
            //die($password,$user->$password);
            if(password_verify($password, $user->password)){
                //login correcte
                //die($user->password);
                $_SESSION['user']=$user;
                //header('Location:?url=dashboard');
                //echo "pppppppppppp";
                return true;
            }
            //return true;
        }
        return false;
        /*
        var_dump($stmt);
        die;
        if($stmt->execute([':email'=>$email])){
            $row=$stmt->fetchAll();
            var_dump($row);
            die();
        }else{
            return false;
        }
        */
    }
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
/*
function connectMysql(string $server, string $userdb, string $passdb, string $dbname)
{
    // $conn = new mysqli($dsn,$userdb, $passdb );
    $conn = new mysqli($server, $userdb, $passdb, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
*/
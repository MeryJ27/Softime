<?php
include_once 'db.inc.php';

class consultasDB extends DB{
    
    function tudime(){
        $query = $this->connect()->prepare('SELECT * FROM administrador WHERE id_administrador = :id ');
        $query->execute(['id' => '1']); 

        $row = $query->fetch(PDO::FETCH_ASSOC);

        print_r($row);

    }

    function existeusuario($userform,$passform){
        $md5pass = md5($passform);
        $query = $this->connect()->prepare('SELECT * FROM cliente WHERE username = :username AND contraseña = :pass');
        $query->execute(['username' => $userform, 'pass' => $md5pass]);

        $row = $query->fetch(PDO::FETCH_ASSOC);

        if($row==true){
            $_SESSION['username']=$row['username'];

            header("location: index.php");
            exit();
        }
    }
}
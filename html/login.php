<?php
    session_start();
    include_once '../includes/consultas.php';

    $cons = new consultasDB();

    if(isset($_SESSION['username'])) {
        header("location: index.php");
        exit();
    }

    if(isset($_POST['userform']) && isset($_POST['passform'])){
       $userform = $_POST['userform'];
       $passform = $_POST['passform']; 

       if($cons->existeusuario($userform,$passform)){
           header("location: index.php");
    } else {
        $errorlogin = "Nombre y/o Contraseña Incorrecto";
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="principal">
        <a href="index.html"><img class="imagenLogo" src="../img/logo.jpeg" alt="Logo de Sportime"></a>
        <h2>Iniciar Sesión</h2><br>
        <?php
        if(isset($errorlogin)){
            echo $errorlogin;
        }
        ?>
        <form class="formulario1" action="" method="POST">
            <input type="text" placeholder="Usuario" name="userform">
            <input type="password" placeholder="Contraseña" name="passform">
            <input type="submit" value="Ingresar">
            <h3>¿No tienes cuenta?</h3><br>
            <a class="linkRegistro" href="../html/registro.html"> Regístrate.</a>
        </form>
    </div>
</body>

</html>
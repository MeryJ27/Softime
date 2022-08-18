<?php
session_start();
include_once 'includes/consultas.php';

$cons = new consultasDB();

if (isset($_SESSION['username'])) {
    include_once 'views/micuenta.php';
} else if (isset($_POST['userform']) && isset($_POST['passform'])) {
    $userform = $_POST['userform'];
    $passform = $_POST['passform'];

    if ($cons->existeusuario($userform, $passform)) {
        include_once 'views/micuenta.php';
    } else {
        $errorlogin = "Nombre y/o Contraseña Incorrecto";
        include_once 'views/login.php';
    }
} else {
    include_once 'views/login.php';
}
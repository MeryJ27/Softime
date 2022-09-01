<?php
include_once '../includes/consultas.php';
$cons = new consultasDB();
session_start();

$dataSend = array(
    'idUsuario' => $_SESSION['id'],
    'username' => $_POST['username'],
    'nombres' => $_POST['nombres'],
    'apellidos' => $_POST['apellidos'],
    'cedula' => $_POST['cedula'],
    'telefono' => $_POST['telefono'],
    'correo' => $_POST['correo'],
    'direccion' => $_POST['direccion']
);

$res = $cons->actualizarDatos($dataSend);

if ($res === true) {
    echo "insertado";
} else {
    echo "error";
}

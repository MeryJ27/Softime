<?php
include_once '../includes/consultas.php';
$cons = new consultasDB();
session_start();

$dataSend = array(
    'idUsuario' => $_POST['userID'],
    'rol' => $_POST['rol'],
    'username' => $_POST['username'],
    'estado' => $_POST['estado'],
    'nombres' => $_POST['nombres'],
    'apellidos' => $_POST['apellidos'],
    'cedula' => $_POST['identificacion'],
    'telefono' => $_POST['telefono'],
    'correo' => $_POST['correo'],
    'direccion' => $_POST['direccion'],
    'password' => $_POST['password']
);

$res = $cons->actualizarDatosControl($dataSend);

if ($res === true) {
    echo "insertado";
} else {
    echo "error";
}
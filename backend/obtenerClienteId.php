<?php
include_once '../includes/consultas.php';
$cons = new consultasDB();

$clienteId = $_POST['userID'];

$res = $cons->obternerClienteId($clienteId);

$row = $res->fetch(PDO::FETCH_ASSOC);

$rolTraducido = "";

if($row['rol'] == 1){
    $rolTraducido = "Cliente";
}else if($row['rol'] == 2){
    $rolTraducido = "Administrador";
}

if($row > 0){
    echo '{"estado": "' . $row['estado'] . '", "username": "' . $row['username'] . '", "nombres": "' . $row['nombres'] . '", "apellidos": "' . $row['apellidos'] . '", "identificacion": "' . $row['cedula_ciudadania'] . '", "telefono": "' . $row['telefono'] . '", "correo": "' . $row['correo'] . '", "direccion": "' . $row['direccion'] . '", "rol": "' . $rolTraducido . '"}';
}else{
    echo "error";
} 
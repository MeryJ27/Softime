<?php
include_once '../includes/consultas.php';
$cons = new consultasDB();

$estado = $_POST['estado'];
$id = $_POST['id'];
$newEstado = "";

if($estado == "Activo"){
    $newEstado = "Inactivo";
}else if($estado == "Inactivo"){
    $newEstado = "Activo";
}else{
    $newEstado = "Error";
}

$res = $cons->cambiarEstado($newEstado, $id);

if($res === true){
    echo $newEstado;
}else{
    echo "error";
}
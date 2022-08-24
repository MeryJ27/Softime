<?php
include_once 'includes/consultas.php';
$consultas = new consultasDB();

if (isset($_POST['registrar'])) {


    $datos = array(
        'username' => $_POST['username'],
        'nombres' => $_POST['nombres'],
        'apellidos' => $_POST['apellidos'],
        'correo' => $_POST['email'],
        'contraseña' => $_POST['password'],
        'concontraseña' => $_POST['confirmar_password']
    );

    $response = $consultas->registrarUsuario($datos);

    if ($response === true) {
        header("location: mi-cuenta.php");
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registro.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Registro</title>
</head>

<body>
    <div class="principal">
        <h2>Regístrate</h2>
        <form class="formularioRegistro" action="" method="POST">
            <div class="inputgroup" estado="wrong">
                <i class='bx bx-user-circle'></i>
                <input class="inputFormulario" type="text" name="username" placeholder="Nombre de usuario">
            </div>
            <div class="inputgroup" estado="wrong">
                <i class='bx bx-user-circle'></i>
                <input class="inputFormulario" type="text" name="nombres" placeholder="Nombres">
            </div>
            <div class="inputgroup" estado="wrong">
                <i class='bx bx-user-circle'></i>
                <input class="inputFormulario" type="text" name="apellidos" placeholder="Apellidos">
            </div>
            <div class="inputgroup" estado="wrong">
                <i class='bx bx-mail-send'></i>
                <input class="inputFormulario" type="text" name="email" placeholder="Email">
            </div>
            <div class="inputgroup" estado="wrong">
                <i class='bx bx-lock-alt'></i>
                <input class="inputFormulario" type="password" name="password" placeholder="Contraseña">
            </div>
            <div class="inputgroup" estado="wrong">
                <i class='bx bx-lock-alt'></i>
                <input class="inputFormulario" type="password" name="confirmar_password"
                    placeholder="Confirmar Contraseña">
            </div>

            <input id="btnRegistro" class="invalid" type="submit" name="registrar" value="Registrarme">
        </form>
    </div>

    <script src="js/registro.js"></script>
</body>

</html>
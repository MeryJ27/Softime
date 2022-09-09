<?php
session_start();
if (!isset($_SESSION['rolCliente']) || $_SESSION['rolCliente'] != 2) {
    header('location: index.php');
    exit();
}

include_once 'includes/consultas.php';
$consultas = new consultasDB();

if (isset($_POST['crear'])) {
    $data = array(
        'estado' => $_POST['estado'],
        'username' => $_POST['username'],
        'nombres' => $_POST['nombres'],
        'apellidos' => $_POST['apellidos'],
        'cedula' => $_POST['identificacion'],
        'telefono' => $_POST['telefono'],
        'correo' => $_POST['correo'],
        'direccion' => $_POST['direccion'],
        'contraseña' => $_POST['password'],
        'rol' => $_POST['cargo']
    );

    $response = $consultas->crearUsuario($data);

    if ($response === true) {
        header('location: control.php');
        exit();
    }
}



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/generarUsuario.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script> <!-- libreia jquery -->
    <title>Crear Usuario</title>
</head>


<body>
    <?php
    include_once "includes/menu.php";
    ?>

    <section class="mainContainer">
        <div class="left">
            <div class="imgContainer">
                <img src="img/backForm3.jpg" alt="">
            </div>
        </div>
        <div class="right">
            <div class="content">
                <h3>Bienvenido a Softime</h3>
                <span>¡Vamos a crear una cuenta para un nuevo usuario!</span>
                <form action="" method="post">
                    <div class="rowInputs">
                        <div class="inputContainer">
                            <label for="nombresInput">Nombres</label>
                            <input type="text" name="nombres" id="nombresInput" placeholder="Nombres" required estado="wrong">
                        </div>
                        <div class="inputContainer">
                            <label for="apellidosInput">Apellidos</label>
                            <input type="text" name="apellidos" id="apellidosInput" placeholder="Apellidos" required estado="wrong">
                        </div>
                    </div>
                    <div class="rowInputs">
                        <div class="inputContainer">
                            <label for="usernameInput">Username</label>
                            <input type="text" name="username" id="usernameInput" placeholder="Nombre De Usuario" required estado="wrong">
                        </div>
                        <div class="inputContainer">
                            <label for="direccionInput">Dirección</label>
                            <input type="text" name="direccion" id="direccionInput" placeholder="Dirección" required estado="wrong">
                        </div>
                    </div>
                    <div class="rowInputs">
                        <div class="inputContainer">
                            <label for="identificacionInput">Identificación</label>
                            <input type="text" name="identificacion" id="identificacionInput" placeholder="Identificación" required estado="wrong">
                        </div>
                        <div class="inputContainer">
                            <label for="telefonoInput">Teléfono</label>
                            <input type="text" name="telefono" id="telefonoInput" placeholder="Teléfono" required estado="wrong">
                        </div>
                    </div>
                    <div class="rowInputs">
                        <div class="inputContainer">
                            <label for="correoInput">Correo</label>
                            <input type="email" name="correo" id="correoInput" placeholder="Correo" required estado="wrong">
                        </div>
                        <div class="inputContainer">
                            <label for="confCorreoInput">Confirmar Correo</label>
                            <input type="email" name="confCorreo" id="confCorreoInput" placeholder="Confirmar Correo" required estado="wrong">
                        </div>
                    </div>
                    <div class="rowInputs">
                        <div class="inputContainer">
                            <label for="passwordInput">Contraseña</label>
                            <input type="password" placeholder="Contraseña" name="password" id="passwordInput" required estado="wrong">
                        </div>
                        <div class="inputContainer">
                            <label for="confPasswordInput">Confirmar Contraseña</label>
                            <input type="password" placeholder="Confirma la contraseña" name="confPassword" id="confPasswordInput" required estado="wrong">
                        </div>
                    </div>
                    <div class="rowInputs">
                        <div class="inputContainer">
                            <label for="estadoSelect">Estado</label>
                            <select name="estado" id="estadoSelect" required>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                        <div class="inputContainer">
                            <label for="cargoSelect">Confirmar Contraseña</label>
                            <select name="cargo" id="cargoSelect" required>
                                <option value="1">Cliente</option>
                                <option value="2">Administrador</option>
                            </select>
                        </div>
                    </div>
                    <input id="btnFormCrear" class="formInvalid" type="submit" name="crear" value="Crear">
                </form>
            </div>
        </div>
    </section>
    <script src="js/generarUsuario.js"></script>
</body>

</html>
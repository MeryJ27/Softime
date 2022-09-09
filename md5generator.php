<?php
if (isset($_POST['generarPass'])) {
    $passForm = $_POST['passwordForm'];
    $md5pass = md5($passForm);
    echo "tu contraseña es: <pre>" . $md5pass . "</pre>";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <input type="text" name="passwordForm" id="">
        <input type="submit" value="Generar" name="generarPass">
    </form>
</body>

</html>
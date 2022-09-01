<?php
include_once "includes/consultas.php";
include_once 'includes/functions.php';
$cons = new consultasDB();
$f = new funciones();
$res = $cons->obtenerClientes();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/control.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script> <!-- libreia jquery -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/ed68f2a6f3.js" crossorigin="anonymous"></script>
    <title>Panel de Control</title>
</head>

<body>
    <?php
    include_once "includes/menu.php";
    ?>

    <div class="main_content">
        <div class="mainRow">
            <div class="dataPanel">
                <div class="dataPanelHeader">
                    <div class="left">
                        Usuarios
                    </div>
                    <div class="center">
                        <div class="backSearchTable">
                            <i class="bx bx-search-alt"></i>
                            <input type="text" name="search" id="search" placeholder="Buscar...">
                        </div>
                    </div>
                    <div class="right">
                        <select name="state" id="maxRows">
                            <option value="5000">Mostrar todo</option>
                            <option value="5" selected="">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="75">75</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                </div>
                <div class="tablaContainer">
                    <table id="usuariosTabla" class="mainDataTablePedidos">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Nombres y Apellidos</th>
                                <th>Rol</th>
                                <th>Estado</th>
                                <th>Último Login</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr>
                                <th><?php echo $row['id_usuario']; ?></th>
                                <th><?php echo $row['username']; ?></th>
                                <th><?php echo $row['nombres'] . " " . $row['apellidos']; ?></th>
                                <th><?php echo $f->mostrarRol($row['rol']); ?></th>
                                <th class="estado" id_estado="<?php echo $row['id_usuario']; ?>"><span
                                        class="<?php echo strtolower($row['estado']); ?>"><?php echo $row['estado']; ?></span>
                                </th>
                                <th><?php echo $row['ultimo_login']; ?></th>
                                <th>
                                    <div class="accionesContainer">
                                        <div class="acciones btnActions">
                                            <i class="material-symbols-outlined">
                                                more_horiz
                                            </i>
                                        </div>
                                        <div class="menuAcciones" id_estado="<?php echo $row['id_usuario']; ?>">
                                            <a href="#" class="optionMenuAcciones">Detalles</a>
                                            <a href="#" class="optionMenuAcciones">Ver Facturas</a>
                                            <span class="optionMenuAcciones changeStatus"
                                                onclick="changeStatus(<?php echo '`' . $row['estado'] . '`' ?>, <?php echo $row['id_usuario']; ?>)">Cambiar
                                                Estado</span>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="paginacionContainer">
                    <nav class="paginacion">
                        <ul class="ulPaginacion">
                            <div class="insertPrevButton"></div>
                            <div class="insertLi"></div>
                            <div class="insertNextButton"></div>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <script src="js/table.js"></script>
    <script src="js/control.js"></script>
</body>

</html>
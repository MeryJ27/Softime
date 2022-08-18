<?php
include_once 'includes/functions.php';

$f = new funciones();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/micuenta.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script> <!-- libreia jquery -->
    <title>Mi Cuenta</title>
</head>

<body>
    <header id="encabezado">

        <h2>Sportime</h2>

        <a href="index.php"><img src="img/logo.jpeg" id="logo" alt="logo de la empresa"></a>

        <nav>
            <ul id="menu">
                <li><a href="mi-cuenta.php">Mi Cuenta</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="clientes.php">Clientes Felices</a></li>
                <li><a href="catalogo.php">Catálogo</a></li>
                <li><a href="index.php">Inicio</a></li>
            </ul>
        </nav>
    </header>
    <div class="mainContainer">
        <div class="left sectionmaincontainer">
            <div class="top">
                <div class="avatarprofile">
                    <img src="http://src.neapyre.com/images/avatar_woman.png" alt="avatar">
                </div>
                <h2><?php echo $_SESSION['nombreCliente']; ?></h2>
                <span><?php echo $f->mostrarRol($_SESSION['rolCliente']); ?></span>
                <span><?php echo $_SESSION['ceduCliente']; ?></span>
            </div>
            <div class="bottom">
                <div class="optionprofile" id="detallesbtn">
                    <i class="material-symbols-outlined">
                        account_circle
                    </i>
                    <span>Detalles de la Cuenta</span>
                </div>
                <div class="optionprofile" id="miscomprasbtn">
                    <i class="material-symbols-outlined">
                        shopping_cart
                    </i>
                    <span>Mis Compras</span>
                </div>
                <div class="optionprofile">
                    <a href="includes/logout.php">
                        <i class="material-symbols-outlined">
                            no_accounts
                        </i>
                        <span>Cerrar Sesión</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="right sectionmaincontainer">
            <div class="pagesSlider">
                <div class="page page1">
                    <div class="optiondetails">
                        <div class="optionnamedetails">
                            <span>Nombre de Usuario:</span>
                        </div>
                        <div class="optiondescriptiondetails">
                            <span><?php echo $_SESSION['username']; ?></span>
                        </div>
                    </div>
                    <div class="optiondetails">
                        <div class="optionnamedetails">
                            <span>Nombre:</span>
                        </div>
                        <div class="optiondescriptiondetails">
                            <span><?php echo $_SESSION['nombreCliente']; ?></span>
                        </div>
                    </div>
                    <div class="optiondetails">
                        <div class="optionnamedetails">
                            <span>Apellido:</span>
                        </div>
                        <div class="optiondescriptiondetails">
                            <span><?php echo $_SESSION['apeCliente']; ?></span>
                        </div>
                    </div>
                    <div class="optiondetails">
                        <div class="optionnamedetails">
                            <span>Cedula de Ciudadania:</span>
                        </div>
                        <div class="optiondescriptiondetails">
                            <span><?php echo $_SESSION['ceduCliente']; ?></span>
                        </div>
                    </div>
                    <div class="optiondetails">
                        <div class="optionnamedetails">
                            <span>Telefono:</span>
                        </div>
                        <div class="optiondescriptiondetails">
                            <span><?php echo $_SESSION['teleCliente']; ?></span>
                        </div>
                    </div>
                    <div class="optiondetails">
                        <div class="optionnamedetails">
                            <span>Correo:</span>
                        </div>
                        <div class="optiondescriptiondetails">
                            <span><?php echo $_SESSION['correoCliente']; ?></span>
                        </div>
                    </div>
                    <div class="optiondetails">
                        <div class="optionnamedetails">
                            <span>Dirección:</span>
                        </div>
                        <div class="optiondescriptiondetails">
                            <span><?php echo $_SESSION['direCliente']; ?></span>
                        </div>
                    </div>
                </div>
                <div class="page page2">
                    <div class="tablaContainer">
                        <table class="mainDataTablePedidos">
                            <thead>
                                <tr>
                                    <th>Número Pedido</th>
                                    <th>Dirección</th>
                                    <th>Estado</th>
                                    <th>Valor</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <th>Calle 71</th>
                                    <th class="estado">Entregado</th>
                                    <th>350214</th>
                                    <th>
                                        <div class="accionesContainer">
                                            <div class="acciones btnActions">
                                                <i class="material-symbols-outlined">
                                                    more_horiz
                                                </i>
                                            </div>
                                            <div class="menuAcciones">
                                                <a href="#">Detalles</a>
                                                <a href="#">Ver Factura</a>
                                                <a href="#">Rastrear Pedido</a>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th>2</th>
                                    <th>Avenida 33 #57-78, Bello, Antioquia</th>
                                    <th class="estado">Entregado</th>
                                    <th>350216</th>
                                    <th>
                                        <div class="accionesContainer">
                                            <div class="acciones btnActions">
                                                <i class="material-symbols-outlined">
                                                    more_horiz
                                                </i>
                                            </div>
                                            <div class="menuAcciones">
                                                <a href="#">Detalles</a>
                                                <a href="#">Ver Factura</a>
                                                <a href="#">Rastrear Pedido</a>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="paginacionContainer">
                        <nav class="paginacion">
                            <ul class="ulPaginacion">
                                <div class="insertPrevButton">
                                    <li class="pageItem prevPage disabled" id="prevPageButton" data_page="1">
                                        <span class="pageLink">
                                            < </span>
                                    </li>
                                </div>
                                <div class="insertLi">
                                    <li class="pageItem active" data_page="1"><span class="pageLink">1</span></li>
                                    <li class="pageItem" data_page="2"><span class="pageLink">2</span></li>
                                    <li class="pageItem" data_page="3"><span class="pageLink">3</span></li>
                                </div>
                                <div class="insertNextButton">
                                    <li class="pageItem nextPage" id="nextPageButton" data_page="2">
                                        <span class="pageLink">
                                            > </span>
                                    </li>
                                </div>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/micuenta.js"></script>
</body>

</html>
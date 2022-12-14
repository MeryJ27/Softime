<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/catalogo.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Catálogo</title>
</head>

<body>

    <?php
    include_once "includes/menu.php";
    ?>

    <section class="catalogoProductos">
        <ul class="productsCat">
            <li>
                <section id="informacion1" class="productItem">
                    <article id="productos">
                        <div class="imagen">
                            <img class="imagenPro" src="img/catalogo1.png" alt="Top Deportivo">
                        </div>
                        <div class="texto">
                            <h2>Top Deportivo Azul</h2><br>
                            <h3>$ 50.000</h3><br>
                            <a href="#">Añadir Al Carrito</a>
                        </div>
                    </article>
                </section>
            </li>
            <li>
                <section id="informacion2" class="productItem">
                    <article id="productos">
                        <div class="imagen">
                            <img class="imagenPro" src="img/catalogo2.png" alt="Top Deportivo">
                        </div>
                        <div class="texto">
                            <h2>Top Deportivo Negro</h2><br>
                            <h3>$ 62.000</h3><br>
                            <a href="#">Añadir Al Carrito</a>
                        </div>
                    </article>
                </section>
            </li>
            <li>
                <section id="informacion3" class="productItem">
                    <article id="productos">
                        <div class="imagen">
                            <img class="imagenPro" src="img/catalogo3.png" alt="Top Deportivo">
                        </div>
                        <div class="texto">
                            <h2>Top Deportivo</h2><br>
                            <h3>$ 52.000</h3><br>
                            <a href="#">Añadir Al Carrito</a>
                        </div>
                    </article>
                </section>
            </li>
            <li>
                <section id="informacion4" class="productItem">
                    <article id="productos">
                        <div class="imagen">
                            <img class="imagenPro" src="img/catalogo4.png" alt="Top Deportivo">
                        </div>
                        <div class="texto">
                            <h2>Top Deportivo</h2><br>
                            <h3>$ 57.000</h3><br>
                            <a href="#">Añadir Al Carrito</a>
                        </div>
                    </article>
                </section>
            </li>
            <li>
                <section id="informacion5" class="productItem">
                    <article id="productos">
                        <div class="imagen">
                            <img class="imagenPro" src="img/catalogo5.png" alt="Top Deportivo">
                        </div>
                        <div class="texto">
                            <h2>Top Deportivo Azul</h2><br>
                            <h3>$ 50.000</h3><br>
                            <a href="#">Añadir Al Carrito</a>
                        </div>
                    </article>
                </section>
            </li>
            <li>
                <section id="informacion6" class="productItem">
                    <article id="productos">
                        <div class="imagen">
                            <img class="imagenPro" src="img/catalogo6.png" alt="Top Deportivo">
                        </div>
                        <div class="texto">
                            <h2>Top Deportivo Negro</h2><br>
                            <h3>$ 62.000</h3><br>
                            <a href="#">Añadir Al Carrito</a>
                        </div>
                    </article>
                </section>
            </li>
            <li>
                <section id="informacion7" class="productItem">
                    <article id="productos">
                        <div class="imagen">
                            <img class="imagenPro" src="img/catalogo7.png" alt="Top Deportivo">
                        </div>
                        <div class="texto">
                            <h2>Top Deportivo</h2><br>
                            <h3>$ 52.000</h3><br>
                            <a href="#">Añadir Al Carrito</a>
                        </div>
                    </article>
                </section>
            </li>
            <li>
                <section id="informacion8" class="productItem">
                    <article id="productos">
                        <div class="imagen">
                            <img class="imagenPro" src="img/catalogo8.webp" alt="Top Deportivo">
                        </div>
                        <div class="texto">
                            <h2>Top Deportivo</h2><br>
                            <h3>$ 57.000</h3><br>
                            <a href="#">Añadir Al Carrito</a>
                        </div>
                    </article>
                </section>
            </li>
        </ul>
    </section>
    <footer class="piePagina">
        <p>Contáctenos</p>
        <p>Línea Gratuita 018000-00001</p>
        <p><a href="mailto:preguntas@sportime.com">Correo: preguntas@sportime.com</a></p>
    </footer>

</body>

</html>
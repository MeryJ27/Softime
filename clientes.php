<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Clientes.css">
    <title>Clientes Felices</title>
</head>

<body>

    <?php
    include_once "includes/menu.php";
    ?>
    <div>
        <img id="background" src="img/backgruond.png" alt="Color de Fondo">
    </div>
    <div id="texto">
        <h2>Clientes Felices</h2>
    </div>
    <div class="clientesContainer">
        <section id="cliente1" class="fila1">
            <article>
                <div class="imagen">
                    <img class="imagen1" src="img/cliente1.jpg" alt="Top Deportivo">
                </div>
                <div class="icono">
                    <img src="img/1.png" alt="">
                </div>
            </article>
        </section>


        <section id="cliente2" class="fila2">
            <article>
                <div class="imagen">
                    <img class="imagen2" src="img/cliente2.jpg" alt="Top Deportivo">
                </div>
                <div class="icono">
                    <img src="img/2.png" alt="">
                </div>
            </article>
        </section>


        <section id="cliente3" class="fila1">
            <article id="productos">
                <div class="imagen">
                    <img class="imagen3" src="img/cliente3.jpg" alt="Top Deportivo">
                </div>

                <div class="icono">
                    <img src="img/3.png" alt="">

                </div>

            </article>
        </section>


        <section id="cliente4" class="fila2">
            <article id="productos">
                <div class="imagen">
                    <img class="imagen4" src="img/cliente4.jpg" alt="Top Deportivo">
                </div>
                <div class="icono">
                    <img src="img/4.png" alt="">
                </div>
            </article>


        </section>


    </div>

    <footer class="piePagina">
        <p>Contáctenos</p>
        <p>Línea Gratuita 018000-00001</p>
        <p><a href="mailto:preguntas@sportime.com">Correo: preguntas@sportime.com</a></p>
    </footer>

</body>

</html>
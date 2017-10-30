<!DOCTYPE html> <!-- Pagina visible de las categorias --> <!-- -->

<html>

    <head>

        <meta charset="utf-8">
        <html lang="es">
        <title>Categorias</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/social.css">

    </head>

    <body>
    <div class="contenedor">

        <div class="header">

            <div class="logo">
                <img src="img/logo.png" alt="Logo">
            </div>

            <div class="menu-busqueda">
                <div class="search">
                    <form action="busqueda.php" method="POST">
                        <input type="text" name="palabra" placeholder="Buscar..." id="search" class="input-search">
                    </form>
                </div>

                <div class="links">
                    <a href="index.php">Inicio</a>
                    <a href="categorias.php">Categorías</a>
                    <a href="nosotros.php">Quienes Somos</a>
                    <a href="contacto.php">Contacto</a>
                </div>
            </div>
        </div>





        <div class="product-gallery">

            <h1 class="titulo"> Albumes</h1> <hr>

            <?php
            include "funcion.php";
            mostrar_album1();
            ?>

        </div>

        <footer>

                <?php
                    redsocial();
                ?>
        </footer>

    </div>
    </body>
</html>

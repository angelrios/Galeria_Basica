<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8">
        <html lang="es">
        <title>Contacto</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/social.css">

        <!-- Banner -->
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
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





        <div class="contacto">

            <div class="textomision">

                <h2>Contactanos</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora, est, blanditiis! Corporis, earum aspernatur laboriosam molestiae blanditiis molestias accusantium nemo quae, ea doloremque pariatur quos consectetur debitis perferendis. Sunt, magni.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint accusantium doloremque, numquam, aut, modi similique corporis totam nulla pariatur nesciunt harum mollitia. Qui inventore dolores laboriosam, delectus temporibus deserunt neque?</p>
                <br>

            </div>

        </div>

        <footer>

                <?php
                include "funcion.php";
                    redsocial();
                ?>
        </footer>
    </div>
    </body>
</html>




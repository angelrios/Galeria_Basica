<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8">
        <html lang="es">
        <title>Nosotros</title>
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





        <div class="mision">

            <div class="textomision">
                <h1>Mision </h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione eos accusantium quisquam fuga veritatis obcaecati necessitatibus atque quos, maiores aliquam, voluptate nam autem repellat, molestiae aliquid ducimus cumque distinctio culpa. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, nemo ducimus quae adipisci architecto corporis optio at placeat quibusdam explicabo, veniam voluptates modi ipsum non sequi esse itaque voluptatum repudiandae.
                </p>
                <br>
                <br>
                <h1>Vision </h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione eos accusantium quisquam fuga veritatis obcaecati necessitatibus atque quos, maiores aliquam, voluptate nam autem repellat, molestiae aliquid ducimus cumque distinctio culpa.

                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores ullam dolorem temporibus totam porro id voluptas hic praesentium inventore labore harum, amet, reiciendis delectus accusantium cupiditate voluptatum recusandae eaque voluptates.
                </p>
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

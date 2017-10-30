<!DOCTYPE html>

<html>



    <head>
        <meta charset="utf-8">
        <html lang="es">
        <title>Error</title>
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

        <div class="espacio">
            <br>
        </div>


        <h1 class="mensaje-error">
        <?php

            if (isset($_POST['error']))
            {

                $msj=$_POST['error'];
                $back=$_POST['pagina'];
                echo '<span class="mensaje-error">'.$msj.'</span>';
                echo "<br>";
                echo '<span class="mensaje-error">Presione <a href="'.$back.'">aqui</a> para regresar.</span>';
            }
            else
                echo'No hay error para mostrar';
        ?>
        </h1>

        <footer>

                <?php
                    include "funcion.php";
                    redsocial();
                ?>

        </footer>
    </div>
    </body>
</html>
